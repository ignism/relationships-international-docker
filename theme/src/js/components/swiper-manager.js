import 'swiper/dist/css/swiper.min.css'
import Swiper from 'swiper'
import { CoreModule } from '../core/core-module'

class SwiperManager extends CoreModule {
  init() {
    this.containers = document.querySelectorAll('.swiper-container')
    this.instances = []

    this.containers.forEach(container => {
      let instance = new Swiper(container, {
        loop: true,
        pagination: {
          el: container.querySelector('.swiper-pagination')
        }
      })

      this.instances.push(instance)
    })

    return super.init()
  }

  destroy() {
    this.instances.forEach(instance => {
      instance.destroy()
    })

    super.destroy()
  }
}

export const swiperManager = new SwiperManager()
