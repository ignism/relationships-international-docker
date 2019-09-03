import offset from 'document-offset'
import { CoreModule } from '../core/core-module'

class Paralax extends CoreModule {
  init(options) {
    this.elements = document.querySelectorAll('.paralax')
    this.listener = false

    if (window.innerWidth > 640) {
      window.addEventListener('scroll', this.placeElements.bind(this))
      this.listener = true
    }

    return super.init()
  }

  destroy() {
    if (this.listener) {
      window.removeEventListener('scroll', this.placeElements.bind(this))
    }
    super.destroy()
  }

  placeElements(event) {
    this.elements.forEach(element => {
      let displacement = this.getDisplacement(offset(element).top)
      element.style.bottom = (displacement * -50) + '%'
    })
  }

  getDisplacement(top) {
    let h = window.innerHeight
    let p = h + window.scrollY - top
    
    return Math.min(h, Math.max(0, p)) / h
  }
}

export const paralax = new Paralax()
