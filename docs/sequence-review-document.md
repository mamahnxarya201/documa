sequenceDiagram
    User->>+DocumentController: POST /document/{document_id}/review
    DocumentController->>+DocumentService: reviewDocument(documentId)
    DocumentService->>+Repository: GetCachedDocumentById(documentId)
    alt CachedDocument is null
        DocumentService->>Repository: getDocumentById(documentId)
    end
    DocumentService->>Repository: AddReviewDocument(file, documentId)
    alt isDocumentPublished is true
        DocumentService->>Repository: updateDocumentStatus()
        DocumentService->>+NotifyService: notifySubscriberUser()
    end
    Repository->>-DocumentService: return onSucces
    DocumentService->>Repository: writeLog($action)
    DocumentService->>+NotifyService: notifySubscriberUser()
    NotifyService->>NotifyService: sendNotification() 
    DocumentService->>Repository: writeLog($action)
    Repository->>Repository: commit()
    DocumentService->>-DocumentController: return Documents
    DocumentController->>-User: render(document-list.html.twig, $documentList)
