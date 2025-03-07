TABLE proyectos (
    proyectos_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_proyecto VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fecha_inicio DATE,
    fecha_fin DATE,
    estado ENUM('En progreso', 'Completado', 'En espera') DEFAULT 'En progreso'
);

-- Inserción de registros en la tabla 'proyectos'
INSERT INTO proyectos (nombre_proyecto, descripcion, fecha_inicio, fecha_fin, estado) VALUES
('Sitio Web Corporativo', 'Desarrollo de la página web corporativa para la empresa XYZ.', '2025-01-10', '2025-03-15', 'Completado');
INSERT INTO proyectos (nombre_proyecto, descripcion, fecha_inicio, fecha_fin, estado) VALUES
('Tienda en Línea', 'Implementación de una plataforma de comercio electrónico para ABC Store.', '2025-02-01', NULL, 'En progreso');
INSERT INTO proyectos (nombre_proyecto, descripcion, fecha_inicio, fecha_fin, estado) VALUES
('Aplicación Móvil', 'Desarrollo de una aplicación móvil para servicios de entrega.', '2025-03-05', NULL, 'En espera');
INSERT INTO proyectos (nombre_proyecto, descripcion, fecha_inicio, fecha_fin, estado) VALUES
('Plataforma de Reservas', 'Desarrollo de un sistema de reservas en línea para un hotel.', '2025-04-01', NULL, 'En progreso');
INSERT INTO proyectos (nombre_proyecto, descripcion, fecha_inicio, fecha_fin, estado) VALUES
('Portal de Noticias', 'Creación de un portal web con noticias y artículos sobre tecnología.', '2025-02-15', '2025-05-30', 'En progreso');
INSERT INTO proyectos (nombre_proyecto, descripcion, fecha_inicio, fecha_fin, estado) VALUES
('Sistema de Facturación', 'Implementación de un sistema automatizado para la gestión de facturas.', '2025-01-20', '2025-04-10', 'Completado');
INSERT INTO proyectos (nombre_proyecto, descripcion, fecha_inicio, fecha_fin, estado) VALUES
('Red Social Corporativa', 'Desarrollo de una red social interna para mejorar la comunicación entre empleados.', '2025-03-10', NULL, 'En espera');
