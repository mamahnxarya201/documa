sequenceDiagram
    User->>+DocumentController: GET /document
    DocumentController->>+DocumentService: getListDocument()
    DocumentService->>+Repository: GetListCachedDocument()
    alt CachedDocument is null
        DocumentService->>Repository: getListDocument()
        DocumentService->>Repository: insertDocumentCache()
        DocumentService->>Repository: writeLog($action)
    end
    Repository->>-DocumentService: return $documentList
    DocumentService->>Repository: writeLog($action)
    Repository->>Repository: commit()
    DocumentService->>-DocumentController: return Documents
    DocumentController->>-User: render(document-list.html.twig, $documentList)
