sequenceDiagram
    User->>+DocumentController: POST /document/{document_id}/add_file
    DocumentController->>+DocumentService: getDocumentById(documentId)
    DocumentService->>+Repository: GetCachedDocumentById(documentId)
    alt CachedDocument is null
        DocumentService->>Repository: getDocumentById(documentId)
    end
    DocumentService->>Repository: insertFileIntoDocument(file, documentId)
    Repository->>-DocumentService: return onSucces
    DocumentService->>Repository: writeLog($action)
    DocumentService->>+NotifyService: notifySubscriberUser()
    NotifyService->>NotifyService: sendNotification() 
    DocumentService->>Repository: writeLog($action)
    Repository->>Repository: commit()
    DocumentService->>-DocumentController: return Documents
    DocumentController->>-User: render(document-list.html.twig, $documentList)
