import { startStimulusApp } from '@symfony/stimulus-bundle';
import document_list_scroll_controller from "./controllers/document_list_scroll_controller.js";


const app = startStimulusApp();
// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);
// app.register('search', Search_controller)
app.register('scroll', document_list_scroll_controller)