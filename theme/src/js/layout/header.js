import { CoreModule } from '../core/core-module'
import { CoreEvent } from '../core/core-event'

class Header extends CoreModule {
  init(options) {
    this.element = options.element

    if (this.element) {
      this.events.push(
        new CoreEvent('scrolled-from-top', () => {
          this.pin()
        })
      )

      this.events.push(
        new CoreEvent('scrolled-to-top', () => {
          this.unpin()
        })
      )

      this.events.push(
        new CoreEvent('scrolled-past-offset', (event) => {
          if (event.direction === 'FORWARD') {
            this.hide()
          } else if (event.direction === 'REVERSE') {
            this.show()
          }
        })
      )

      this.element.addEventListener('mouseenter', event => {
        this.element.classList.add('hover')
      })

      this.element.addEventListener('mouseleave', event => {
        this.element.classList.remove('hover')
      })
    } else {
      return { id: this.id, status: false, message: 'no .header-main element' }
    }

    return super.init()
  }

  pin() {
    this.element.classList.add('pinned')
  }

  unpin() {
    this.element.classList.remove('pinned')
  }

  hide() {
    this.element.classList.add('hidden-on-scroll')
  }

  show() {
    this.element.classList.remove('hidden-on-scroll')
  }
}

export const header = new Header()
