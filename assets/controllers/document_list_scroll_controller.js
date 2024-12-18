import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["vehicleInfo", "credentials", "scrollableSection", "leftContent"];

    connect() {
        this.adjustScrollableSectionHeight();
        window.addEventListener("resize", this.adjustScrollableSectionHeight.bind(this));
    }

    disconnect() {
        window.removeEventListener("resize", this.adjustScrollableSectionHeight.bind(this));
    }

    adjustScrollableSectionHeight() {
        const vehicleInfoCard = this.vehicleInfoTarget;
        const credentialsCard = this.credentialsTarget;
        const scrollableSection = this.scrollableSectionTarget;
        // console.log("height:" + vehicleInfoCard.height + credentialsCard.offsetHeight)
        // console.log("offsetheight:" + vehicleInfoCard.offsetHeight + credentialsCard.offsetHeight);
        const totalHeight = vehicleInfoCard.offsetHeight + credentialsCard.offsetHeight;
        console.log(totalHeight)
        console.log(this.leftContentTarget)
        scrollableSection.style.maxHeight = `${totalHeight}px`;
    }
}
