// assets/controllers/create_document_form_controller.js
import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['groupShareWrapper', 'userShareWrapper', 'externalShareWrapper', 'usernameWrapper'];

    toggleShareOptions({ target: { value: selectedOption, checked } }) {
        const shareTargets = {
            'group': [this.groupShareWrapperTarget],
            'user': [this.userShareWrapperTarget, this.usernameWrapperTarget],
            'external_link': [this.externalShareWrapperTarget]
        };

        const toggleMethod = checked ? 'remove' : 'add';

        shareTargets[selectedOption]?.forEach(target =>
            target.classList[toggleMethod]('d-none')
        );
    }
}
