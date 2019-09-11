import 'swiper/dist/css/swiper.min.css'

import Swiper from 'swiper/dist/js/swiper.min.js'
import { CoreModule } from '../core/core-module'

class SwiperManager extends CoreModule {
  init() {
    this.containers = document.querySelectorAll('.swiper-container')
    this.instances = []

    this.containers.forEach(container => {
      let autoplay = container.getAttribute('data-autoplay') == 'true' ? { delay: 5000 } : false

      let instance = new Swiper(container, {
        loop: true,
        autoplay: autoplay,
        simulateTouch: false,
        allowTouchMove: false,
        speed: 600,
        pagination: {
          el: container.querySelector('.swiper-pagination'),
          clickable: true
        }
      })

      container.instance = instance
      container.addEventListener('click', this.onClick)

      this.instances.push(instance)
    })

    return super.init()
  }

  destroy() {
    this.containers.forEach(container => {
      container.removeEventListener('click', this.onClick)
    })
    this.instances.forEach(instance => {
      instance.destroy()
    })

    super.destroy()
  }

  onClick(event) {
    event.currentTarget.instance.slideNext()
  }
}

export const swiperManager = new SwiperManager()
