## Laravel Requests Recorder

This is just a showcase package used for a tutorial on Laravel package development using TDD. Package is not supposed
for production use. If you decide to use it nevertheless maybe think about overriding the `GET /incoming-requests`
route, so you don't expose the recorded requests on your production site.

### Features

* Middleware that is executed on every route automatically
* JSON Body, method and uri of every request is recorded and stored in DB
  * Exception: Within the config file you can choose which methods are included (for example: only *GET*)
* Console command that deletes all recorded requests
* Page listing all recorded requests
