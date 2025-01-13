// assets/controllers/create_document_form_controller.js
import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['groupShareWrapper', 'userShareWrapper', 'externalShareWrapper', 'usernameWrapper'];

    toggleShareOptions(event) {
        const selectedOption = event.target.value;
        this.groupShareWrapperTarget.classList.add('d-none');
        this.userShareWrapperTarget.classList.add('d-none');
        this.externalShareWrapperTarget.classList.add('d-none');
        this.usernameWrapperTarget.classList.add('d-none');

        if (selectedOption === 'group') {
            this.groupShareWrapperTarget.classList.remove('d-none');
        } else if (selectedOption === 'user') {
            this.userShareWrapperTarget.classList.remove('d-none');
            this.usernameWrapperTarget.classList.remove('d-none');
        } else if (selectedOption === 'external_link') {
            this.externalShareWrapperTarget.classList.remove('d-none');
        }
    }
}
