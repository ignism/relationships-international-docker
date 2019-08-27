import { eventBus } from '../core'
import { CoreModule } from '../core/core-module'
import { CoreEvent } from '../core/core-event'

class Breadcrumps extends CoreModule {
  init(options) {
    this.placeholder = document.querySelector('.breadcrumps-placeholder .breadcrumps')
    console.log("TCL: Breadcrumps -> init -> placeholder", this.placeholder.childElementCount)
    this.breadcrumps = document.querySelector('.nav-main .breadcrumps')
    console.log("TCL: Breadcrumps -> init -> breadcrumps", this.breadcrumps.childElementCount)

    if (this.placeholder.childElementCount > 0) {
      this.breadcrumps.classList.remove('hidden')
      this.breadcrumps.innerHTML = this.placeholder.innerHTML
    } else {
      this.breadcrumps.classList.add('hidden')
    }

    return super.init()
  }

  destroy() {
    super.destroy()
  }
}

export const breadcrumps = new Breadcrumps()
