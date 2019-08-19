import { eventBus } from '../core'
import { CoreModule } from '../core/core-module'
import { CoreEvent } from '../core/core-event'

class Nav extends CoreModule {
  init(options) {
    this.element = options.element
    this.addEventListeners()

    this.toggles = document.querySelectorAll('.toggle-menu')
    this.toggles.forEach((toggle) => {
      toggle.addEventListener('click', this.onToggle)
    })

    this.menuItems = document.querySelectorAll('.nav-menu-item')
    this.menuItems.forEach((menuItem) => {
      menuItem.addEventListener('click', this.onClose)

      if (menuItem.querySelector('.submenu')) {
        menuItem.addEventListener('mouseenter', this.expand)
        menuItem.addEventListener('mouseleave', this.collapse)
      }
    })

    return super.init()
  }

  destroy() {
    super.destroy()

    this.toggles.forEach((toggle) => {
      toggle.removeEventListener('click', this.onToggle)
    })

    this.menuItems.forEach((menuItem) => {
      menuItem.removeEventListener('click', this.onClose)
      if (menuItem.querySelector('.submenu')) {
        menuItem.removeEventListener('mouseenter', this.expand)
        menuItem.removeEventListener('mouseleave', this.collapse)
      }
    })
  }

  onToggle(event) {
    eventBus.$emit('toggle-menu', event)
  }

  onClose(event) {
    eventBus.$emit('close-menu', event)
  }

  expand(event) {
    event.currentTarget.classList.add('expand')
  }

  collapse(event) {
    event.currentTarget.classList.remove('expand')
  }

  addEventListeners() {
    this.events.push(
      new CoreEvent('toggle-menu', () => {
        this.toggleMenu()
      })
    )

    this.events.push(
      new CoreEvent('close-menu', () => {
        this.closeMenu()
      })
    )

    this.events.push(
      new CoreEvent('window-resized', () => {
        if (window.innerWidth >= 1024) {
          this.closeMenu()
        }
      })
    )
  }

  closeMenu() {
    if (this.element.classList.contains('animating')) {
      return
    }

    if (this.element.classList.contains('active')) {
      this.element.classList.remove('active')
      this.element.classList.add('animating')
      setTimeout(() => {
        this.element.classList.remove('animating')
      }, 400)
    }
  }

  toggleMenu() {
    if (this.element.classList.contains('animating')) {
      return
    }

    if (this.element.classList.contains('active')) {
      this.element.classList.remove('active')
      this.element.classList.add('animating')
      setTimeout(() => {
        this.element.classList.remove('animating')
      }, 400)
    } else {
      this.element.classList.add('active')
      this.element.classList.add('animating')
      setTimeout(() => {
        this.element.classList.remove('animating')
      }, 400)
    }
  }
}

export const nav = new Nav()
