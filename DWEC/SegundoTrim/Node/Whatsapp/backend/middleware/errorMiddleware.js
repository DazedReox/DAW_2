exports.errorHandler = (err, req, res, next) => {
    console.error(err.stack);
    res.status(err.status || 500).json({
      message: err.message || 'Error interno del servidor',
      error: process.env.NODE_ENV === 'development' ? err : {},
    });
  };
  
  // Middleware para manejar rutas no encontradas
  exports.notFound = (req, res, next) => {
    const error = new Error(`No encontrado - ${req.originalUrl}`);
    error.status = 404;
    next(error);
  };
  