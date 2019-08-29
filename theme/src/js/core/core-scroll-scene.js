import { scrollController } from './scroll-controller'
import ScrollMagic from 'scrollmagic'

class CoreScrollScene {
  constructor(offset = () => { return 0 }, enter = () => {}, leave = () => {}, reinit = false, triggerElement = null, update = () => {}, duration = 0) {
    this.triggerElement = triggerElement
    this.offset = offset
    this.enter = enter
    this.leave = leave
    this.reinit = reinit
    this.update = update
  }

  init() {
    this.scene = new ScrollMagic.Scene({
      triggerElement: this.triggerElement,
      offset: this.offset()
    })
      .on('enter', this.enter)
      .on('leave', this.leave)
      .on('update', this.update)

    scrollController.addScene(this.scene)
  }

  destroy() {
    scrollController.removeScene(this.scene)
  }
}

export { CoreScrollScene }
