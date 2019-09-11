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
      let displacement = this.getDisplacement(element)
      element.style.bottom = (displacement * -100) + '%'
    })
  }

  getDisplacement(element) {
    let h = window.innerHeight
    let p = h + window.scrollY - offset(element).top - element.offsetHeight
    
    return Math.min(h, Math.max(0, p)) / h
  }
}

export const paralax = new Paralax()
