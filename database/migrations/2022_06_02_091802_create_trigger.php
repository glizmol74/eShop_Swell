<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('trigger', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        DB::unprepared("
          CREATE TRIGGER actualizarSaldoC AFTER INSERT ON `documentos` FOR EACH ROW
            BEGIN
               IF NEW.doc_tipo <> 'PED' THEN
                 UPDATE clientes AS C, (SELECT SUM( CASE WHEN doc_tipo LIKE 'NC%' THEN -1 * (doc_total - doc_total_pago) ELSE (doc_total - doc_total_pago) END ) AS saldo
                   FROM documentos WHERE doc_cliente = NEW.doc_cliente AND  (doc_tipo LIKE 'FC%' OR doc_tipo LIKE 'NC%' ) AND doc_estado <> 2 ) T2
                  SET C.cli_saldo = t2.saldo
                 WHERE C.id = NEW.doc_cliente;
               END IF;
            END
        ");

        DB::unprepared("
            CREATE TRIGGER actualizarSaldoCliente AFTER UPDATE ON `documentos` FOR EACH ROW
              BEGIN
                IF NEW.doc_tipo <> 'PED'  THEN
                    UPDATE clientes AS C, (SELECT  SUM( CASE WHEN doc_tipo LIKE 'NC%' THEN -1 * (doc_total - doc_total_pago) ELSE (doc_total - doc_total_pago) END ) AS saldo
                    FROM documentos WHERE doc_cliente = NEW.doc_cliente AND  (doc_tipo LIKE 'FC%' OR doc_tipo LIKE 'NC%' ) AND doc_estado <> 2 ) T2
                    SET C.cli_saldo = t2.saldo
                    WHERE C.id = NEW.doc_cliente;
                END IF;
              END
        ");

        // DB::unprepared("
        //     CREATE TRIGGER cambioEmail AFTER UPDATE ON `users` FOR EACH ROW
        //       BEGIN
        //         IF NEW.correoOk = 0 and OLD.correoOk = 1  THEN
        //             UPDATE users set email_verified_at = NULL WHERE id = NEW.Id;
        //         END IF;
        //       END
        // ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actualizarSaldoC');
        Schema::dropIfExists('actualizarSaldoCliente');
        //Schema::dropIfExists('cambioEmail');
    }
}
