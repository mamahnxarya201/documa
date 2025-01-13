@startuml
skinparam linetype ortho

interface IRepositoryInterface { 
+commit(): void 
+find(id: Integer): Object 
 +delete(id: Integer): void 
}

entity Document {
    -id: Integer
    -title: String
    -content: String
    -status: String
    -subscribedUser: List<User>
}

class DocumentRepository implements IRepositoryInterface {
    -table: String
    -dataSource: String

    +save(document: Document): void
    +findById(id: Integer): Document
    +findAll(): List<Document>
}

class DocumentService {
    #repository: DocumentRepository
    
    +createDocument(documentData: Array): Document
    +uploadFile(documentId: Integer, file: File): void
    +reviewDocument(documentId: Integer): void
    +publishDocument(documentId: Integer): void
    +sendNotification(documentId: Integer): void
}

class DocumentController {
    +createAction(): void
    +uploadAction(): void
    +reviewAction(): void
    +publishAction(): void
}


DocumentRepository -[hidden]-> Document
DocumentService -[hidden]-> DocumentRepository
DocumentService -[hidden]-> Document
DocumentController -[hidden]-> DocumentService

DocumentRepository --> Document : manages
DocumentService --> DocumentRepository : uses
DocumentService --> Document : operates on
DocumentController --> DocumentService : uses

entity Notification {
    -id: Integer
    -message: String
    -recipient: String
    -status: String
}

class NotificationService {
    #sendNotification(notification: Notification): void
}

class LogService {
    #repository: LogRepository 
    
    +writeLog()
}

class LogRepository implements IRepositoryInterface {
    #table: String
    #dataSource: String

    +getAllByFilter(filter: Array): List<Log>
    +save(log: Log): void
}

entity Log {
  -id: Integer
  -Subject: String
  -When: Integer
  -Who: String
  -Content: String
}

LogService --> LogRepository: uses
LogRepository --> Log: manages
DocumentService -[hidden]-> NotificationService
NotificationService -[hidden]-> Notification

DocumentService --> NotificationService : uses
NotificationService --> Notification : manages
@enduml
