const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"login":{"uri":"\/","methods":["GET","HEAD"]},"login.submit":{"uri":"login","methods":["POST"]},"logout":{"uri":"logout","methods":["POST"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"operating-units":{"uri":"operating-units","methods":["GET","HEAD"]},"add-csv":{"uri":"add-csv","methods":["GET","HEAD"]},"upload.csv":{"uri":"upload-csv","methods":["POST"]},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
