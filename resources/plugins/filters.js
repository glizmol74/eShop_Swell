
import Vue from 'vue'

import numeral from 'numeral'

Vue.use(numeral);

const dollarFilter = function(value) {
  if (!value) {
    return '$ --'
  }

  return numeral(value).format('($ 0,000.00)')
}

Vue.filter('uppercase', (val) => val.toUpperCase())

// Vue.filter('fecha', (val) => moment(dateString).format('DD/MM/YYYY'))

export { dollarFilter }






// load a locale
numeral.register('locale', 'ar', {
  delimiters: {
    thousands: '.',
    decimal: ','
  },
  abbreviations: {
    thousand: 'k',
    million: 'm',
    billion: 'b',
    trillion: 't'
  },
  currency: {
    symbol: '$'
  }
})

numeral.locale('ar')
