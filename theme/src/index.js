import './css/style.css'

import 'zenscroll'

import { core } from './js/core'
import { header, nav, footer, barbaManager } from './js/layout'
import { images, swiperManager, breadcrumps, paralax } from './js/components'
;(function() {
  core.attach(header, { element: document.querySelector('.header-main') })
  core.attach(nav, { element: document.querySelector('.nav-main') })
  // core.attach(footer, true)
  core.attach(barbaManager)

  core.attach(images, {}, true)
  core.attach(swiperManager, {}, true)
  core.attach(breadcrumps, {}, true)
  core.attach(paralax, {}, true)

  core.init()

  document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
      let loader = document.querySelector('.loader')
      
      loader.style.opacity = 0

      setTimeout(() => {
        loader.style.display = 'none'
      }, 800)
    }
  }
})()
