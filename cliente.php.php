<?php
include 'verificar_cliente.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbería nn</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        /* =========================
           ENCABEZADO
        ========================= */

        header {
            background-color: #333;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        header h1 {
            margin: 0;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-left: 15px;
            transition: 0.3s;
        }

        nav a:hover {
            color: #c59d5f;
        }

        /* =========================
           CONTENIDO
        ========================= */

        main {
            padding: 2rem;
            max-width: 1000px;
            margin: auto;
        }

        .main-content-sections {
            width: 100%;
        }

        .container {
            width: 100%;
            background-image: url('img/fondo.jpg');
            background-size: cover;
            background-position: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
            position: relative;
            border-radius: 8px;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            inset: 0;
            background-color: rgba(0,0,0,0.60);
            z-index: 1;
        }

        .container > * {
            position: relative;
            z-index: 2;
        }

        section {
            margin-bottom: 3rem;
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        #inicio {
            color: white;
        }

        .text-white {
            color: white;
        }

        section h2 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 2.2rem;
        }

        section p {
            font-size: 1.1rem;
            color: #555;
        }

        /* =========================
           BOTONES
        ========================= */

        .btn {
            padding: 12px 25px;
            background-color: #000e8a;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: bold;
            transition: 0.3s;
            margin-top: 1.5rem;
        }

        .btn:hover {
            background-color: #8C6A49;
            transform: translateY(-2px);
        }

        /* =========================
           SERVICIOS
        ========================= */

        #tarjetas-servicios {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .servicio {
            background-color: #eee;
            padding: 30px;
            border-radius: 8px;
            width: 200px;
            height: 120px;
            text-align: center;
            font-weight: bold;
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .servicio::before {
            content: '';
            position: absolute;
            inset: 0;
            background-color: rgba(0,0,0,0.5);
            z-index: 1;
        }

        .servicio:hover::before {
            background-color: rgba(0,0,0,0.7);
        }

        .servicio span {
            position: relative;
            z-index: 2;
            font-size: 1.4rem;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
        }

        .servicio:hover {
            transform: translateY(-5px) scale(1.05);
        }

        .img-1 {
            background-image: url('img/corte.jpg');
            background-size: cover;
            background-position: center;
        }

        .img-2 {
            background-image: url('img/barba.jpg');
            background-size: cover;
            background-position: center;
        }

        .img-3 {
            background-image: url('img/barbaycorte.jpg');
            background-size: cover;
            background-position: center;
        }

        .img-4 {
            background-image: url('img/afeitado.jpg');
            background-size: cover;
            background-position: center;
        }

        .img-5 {
            background-image: url('img/facial.jpg');
            background-size: cover;
            background-position: center;
        }

        /* =========================
           FORMULARIOS
        ========================= */

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 500px;
            margin: 0 auto;
        }

        form label {
            text-align: left;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        form input,
        form textarea,
        form select {
            display: block;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        form textarea {
            resize: vertical;
        }

        form button {
            background-color: #333;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: bold;
            transition: 0.3s;
            margin-top: 1rem;
        }

        form button:hover {
            background-color: #555;
        }

        /* =========================
           MODAL
        ========================= */

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow-y: auto;
            background-color: rgba(0,0,0,0.7);
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal-content {
            background-color: #fff;
            padding: 30px;
            width: 95%;
            max-width: 650px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            border-radius: 15px;
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .close-btn {
            color: #777;
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 32px;
            font-weight: bold;
            cursor: pointer;
            z-index: 10;
        }

        .close-btn:hover {
            color: #000;
        }

        /* =========================
           PASOS DE RESERVA
        ========================= */

        .pasos-reserva {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            width: 100%;
            margin: 20px 0 30px;
        }

        .paso {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 65px;
            color: #aaa;
            transition: 0.3s;
        }

        .paso span {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e5e5e5;
            color: #777;
            font-weight: bold;
            margin-bottom: 5px;
            transition: 0.3s;
        }

        .paso small {
            font-size: 11px;
            white-space: nowrap;
        }

        .paso.activo {
            color: #c59d5f;
            font-weight: bold;
        }

        .paso.activo span {
            background: #c59d5f;
            color: white;
        }

        .paso.completado {
            color: #333;
        }

        .paso.completado span {
            background: #333;
            color: white;
        }

        .linea-paso {
            height: 2px;
            background: #ddd;
            flex: 1;
            max-width: 60px;
            margin: 19px 5px 0;
        }

        /* =========================
           CONTENIDO DE PASOS
        ========================= */

        .paso-contenido {
            display: none;
            animation: aparecer 0.3s ease;
        }

        .paso-contenido.activo {
            display: block;
        }

        @keyframes aparecer {
            from {
                opacity: 0;
                transform: translateX(10px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .titulo-paso {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .titulo-paso h4 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .titulo-paso p {
            font-size: 14px;
            color: #777;
            margin: 0;
        }

        /* =========================
           BOTONES SIGUIENTE / ATRÁS
        ========================= */

        .navegacion-pasos {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-anterior,
        .btn-siguiente,
        .btn-confirmar {
            padding: 12px 22px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
            font-size: 15px;
            transition: 0.3s;
        }

        .btn-anterior {
            background: #777;
            color: white;
        }

        .btn-anterior:hover {
            background: #555;
        }

        .btn-siguiente {
            background: #c59d5f;
            color: white;
            margin-left: auto;
        }

        .btn-siguiente:hover {
            background: #a98248;
        }

        .btn-confirmar {
            background: #198754;
            color: white;
            margin-left: auto;
        }

        .btn-confirmar:hover {
            background: #146c43;
        }

        /* =========================
           CLIENTE
        ========================= */

        .cliente-busqueda {
            background: #f8f8f8;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
        }

        .botones-cliente {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .botones-cliente button {
            flex: 1;
            margin-top: 0;
        }

        .btn-buscar {
            background: #333 !important;
        }

        .btn-nuevo {
            background: #007bff !important;
        }

        .mensaje-busqueda {
            min-height: 20px;
            font-size: 14px;
            text-align: center;
        }

        .cliente-confirmado {
            background: #eef8f0;
            border: 1px solid #b8dfc0;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .cliente-confirmado strong {
            color: #198754;
        }

        /* =========================
           SERVICIOS DEL MODAL
        ========================= */

        .servicios-reserva {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .servicio-opcion {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 18px 12px;
            cursor: pointer;
            background: white;
            text-align: center;
            transition: 0.25s;
        }

        .servicio-opcion:hover {
            border-color: #c59d5f;
            transform: translateY(-2px);
        }

        .servicio-opcion.seleccionado {
            border-color: #c59d5f;
            background: #fbf7f0;
            box-shadow: 0 0 0 2px rgba(197,157,95,0.15);
        }

        .servicio-opcion .icono {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .servicio-opcion strong {
            display: block;
            color: #333;
        }

        .servicio-opcion small {
            color: #777;
        }

        /* =========================
           HORARIOS
        ========================= */

        .horarios-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-top: 15px;
        }

        .btn-horario {
            padding: 12px 8px;
            border: 1px solid #c59d5f;
            background: white;
            color: #333;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-horario:hover {
            background: #c59d5f;
            color: white;
        }

        .btn-horario.seleccionado {
            background: #c59d5f;
            color: white;
            border-color: #c59d5f;
        }

        .btn-horario.ocupado {
            background: #e0e0e0;
            color: #999;
            border-color: #ccc;
            cursor: not-allowed;
        }

        .mensaje-horarios {
            grid-column: 1 / -1;
            text-align: center;
            padding: 15px;
            color: #777;
        }

        /* =========================
           RESUMEN
        ========================= */

        .resumen-cita {
            background: #f8f8f8;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .resumen-fila {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 12px 0;
            border-bottom: 1px solid #ddd;
        }

        .resumen-fila:last-child {
            border-bottom: none;
        }

        .resumen-fila span:first-child {
            color: #777;
        }

        .resumen-fila strong {
            color: #333;
            text-align: right;
        }

        /* =========================
           OCULTAR
        ========================= */

        .hidden {
            display: none !important;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            text-align: center;
            padding: 1.5rem;
            background-color: #333;
            color: white;
            margin-top: 3rem;
            font-size: 0.9rem;
            width: 100%;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            header {
                flex-direction: column;
                text-align: center;
            }

            header nav {
                margin-top: 10px;
                flex-wrap: wrap;
                justify-content: center;
            }

            main {
                padding: 1rem;
            }

            section {
                padding: 1.5rem;
            }

            .servicio {
                width: 80%;
            }

            .modal-content {
                width: 100%;
                padding: 20px;
            }

            .pasos-reserva {
                overflow-x: auto;
                justify-content: flex-start;
            }

            .linea-paso {
                min-width: 20px;
            }

            .servicios-reserva {
                grid-template-columns: 1fr;
            }

            .horarios-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .resumen-fila {
                flex-direction: column;
                gap: 3px;
            }

            .resumen-fila strong {
                text-align: left;
            }
        }

    </style>
</head>

<body>

<header class="header">

    <div>
        <h1>BARBERAP</h1>
    </div>

    <nav>
        <a href="#inicio">Inicio</a>
        <a href="#servicios">Servicios</a>
        <a href="#contacto">Contacto</a>

        <a href="logout.php"
           style="
                background:#dc3545;
                color:white;
                padding:8px 14px;
                border-radius:6px;
                text-decoration:none;
                font-size:14px;
           ">
            Cerrar sesión
        </a>
    </nav>

</header>


<main>

    <div class="main-content-sections">

        <!-- INICIO -->

        <section class="container" id="inicio">

            <h2 class="text-white">
                Estilo y poder en cada corte
            </h2>

            <p class="text-white">
                Bienvenido a tu barbero de confianza.
                Reserva tu cita y luce como un PRO.
            </p>

            <button class="btn" id="btn-reservar">
                Reservar ahora
            </button>

        </section>


        <!-- SERVICIOS -->

        <section id="servicios">

            <h2>Nuestros Servicios</h2>

        </section>


        <section id="tarjetas-servicios">

            <div class="servicio img-1">
                <span>Corte de Cabello</span>
            </div>

            <div class="servicio img-2">
                <span>Arreglo de Barba</span>
            </div>

            <div class="servicio img-3">
                <span>Corte + Barba</span>
            </div>

            <div class="servicio img-4">
                <span>Afeitado Clásico</span>
            </div>

            <div class="servicio img-5">
                <span>Tratamiento Facial</span>
            </div>

        </section>


        <!-- CONTACTO -->

        <section id="contacto">

            <h2>Contáctanos</h2>

            <form id="form-contacto"
                  method="post"
                  action="procesar_contacto.php">

                <input type="text"
                       name="nombre"
                       placeholder="Tu nombre"
                       required>

                <input type="email"
                       name="email"
                       placeholder="Tu email"
                       required>

                <textarea name="mensaje"
                          placeholder="Tu mensaje"
                          rows="5"
                          required></textarea>

                <button type="submit">
                    Enviar mensaje
                </button>

            </form>

        </section>

    </div>

</main>


<!-- ==================================================
     MODAL RESERVA
================================================== -->

<div id="modal-reserva" class="modal">

    <div class="modal-content">

        <span class="close-btn">&times;</span>

        <h3 style="text-align:center; margin-top:0;">
            Reservar Cita
        </h3>


        <form id="form-reserva"
              action="procesar_reserva.php"
              method="POST">


            <!-- =========================
                 INDICADOR DE PASOS
            ========================== -->

            <div class="pasos-reserva">

                <div class="paso activo" data-paso="1">
                    <span>1</span>
                    <small>Cliente</small>
                </div>

                <div class="linea-paso"></div>

                <div class="paso" data-paso="2">
                    <span>2</span>
                    <small>Servicio</small>
                </div>

                <div class="linea-paso"></div>

                <div class="paso" data-paso="3">
                    <span>3</span>
                    <small>Fecha</small>
                </div>

                <div class="linea-paso"></div>

                <div class="paso" data-paso="4">
                    <span>4</span>
                    <small>Hora</small>
                </div>

                <div class="linea-paso"></div>

                <div class="paso" data-paso="5">
                    <span>5</span>
                    <small>Confirmar</small>
                </div>

            </div>


            <!-- ID CLIENTE -->

            <input type="hidden"
                   id="cliente_id"
                   name="cliente_id"
                   value="">


            <!-- ==================================================
                 PASO 1 - CLIENTE
            ================================================== -->

            <div class="paso-contenido activo"
                 data-contenido="1">

                <div class="titulo-paso">

                    <h4>Datos del cliente</h4>

                    <p>
                        Busca tus datos o registra un nuevo cliente.
                    </p>

                </div>


                <div id="client-search-area"
                     class="cliente-busqueda">

                    <label for="cedula_reserva">
                        Identificación:
                    </label>

                    <input type="text"
                           id="cedula_reserva"
                           name="identificacion_reserva"
                           placeholder="Ingresa la identificación o DNI">


                    <div class="botones-cliente">

                        <button type="button"
                                id="btn-buscar-cliente"
                                class="btn-buscar">
                            Buscar Cliente
                        </button>

                        <button type="button"
                                id="btn-crear-usuario"
                                class="btn-nuevo">
                            Crear usuario
                        </button>

                    </div>


                    <p id="search-message"
                       class="mensaje-busqueda">
                    </p>

                </div>


                <!-- DATOS DEL CLIENTE -->

                <div id="client-details-area"
                     class="hidden">

                    <div id="cedula-nuevo-group"
                         style="display:none;">

                        <label for="cedula_nuevo">
                            Identificación:
                        </label>

                        <input type="text"
                               id="cedula_nuevo"
                               name="identificacion_nuevo"
                               placeholder="Identificación del cliente">

                    </div>


                    <label for="nombre_reserva">
                        Nombre:
                    </label>

                    <input type="text"
                           id="nombre_reserva"
                           name="nombre_reserva"
                           placeholder="Nombre del cliente">


                    <label for="apellido_reserva">
                        Apellido:
                    </label>

                    <input type="text"
                           id="apellido_reserva"
                           name="apellido_reserva"
                           placeholder="Apellido del cliente">


                    <label for="email_reserva">
                        Email:
                    </label>

                    <input type="email"
                           id="email_reserva"
                           name="email_reserva"
                           placeholder="email@ejemplo.com">


                    <label for="telefono_reserva">
                        Teléfono:
                    </label>

                    <input type="tel"
                           id="telefono_reserva"
                           name="telefono_reserva"
                           placeholder="Ej: 0991234567">


                    <div class="cliente-confirmado">

                        <strong>
                            ✓ Datos del cliente listos
                        </strong>

                    </div>

                </div>


                <div class="navegacion-pasos">

                    <button type="button"
                            class="btn-siguiente"
                            id="btn-siguiente-1">
                        Siguiente →
                    </button>

                </div>

            </div>


            <!-- ==================================================
                 PASO 2 - SERVICIO
            ================================================== -->

            <div class="paso-contenido"
                 data-contenido="2">

                <div class="titulo-paso">

                    <h4>Selecciona tu servicio</h4>

                    <p>
                        Elige el servicio que deseas realizarte.
                    </p>

                </div>


                <div class="servicios-reserva">

                    <div class="servicio-opcion"
                         data-servicio="corte"
                         data-nombre="Corte de Cabello">

                        <div class="icono">✂️</div>

                        <strong>
                            Corte de Cabello
                        </strong>

                        <small>
                            Servicio de corte
                        </small>

                    </div>


                    <div class="servicio-opcion"
                         data-servicio="barba"
                         data-nombre="Arreglo de Barba">

                        <div class="icono">🧔</div>

                        <strong>
                            Arreglo de Barba
                        </strong>

                        <small>
                            Perfilado y arreglo
                        </small>

                    </div>


                    <div class="servicio-opcion"
                         data-servicio="combo"
                         data-nombre="Corte + Barba">

                        <div class="icono">💈</div>

                        <strong>
                            Corte + Barba
                        </strong>

                        <small>
                            Servicio combinado
                        </small>

                    </div>


                    <div class="servicio-opcion"
                         data-servicio="afeitado"
                         data-nombre="Afeitado Clásico">

                        <div class="icono">🪒</div>

                        <strong>
                            Afeitado Clásico
                        </strong>

                        <small>
                            Afeitado tradicional
                        </small>

                    </div>


                    <div class="servicio-opcion"
                         data-servicio="facial"
                         data-nombre="Tratamiento Facial">

                        <div class="icono">✨</div>

                        <strong>
                            Tratamiento Facial
                        </strong>

                        <small>
                            Cuidado facial
                        </small>

                    </div>

                </div>


                <!-- Select oculto que sigue enviando el servicio a PHP -->

                <select id="servicio"
                        name="servicio"
                        required
                        style="display:none;">

                    <option value="">
                        Selecciona un servicio
                    </option>

                    <option value="corte">
                        Corte de Cabello
                    </option>

                    <option value="barba">
                        Arreglo de Barba
                    </option>

                    <option value="combo">
                        Corte + Barba
                    </option>

                    <option value="afeitado">
                        Afeitado Clásico
                    </option>

                    <option value="facial">
                        Tratamiento Facial
                    </option>

                </select>


                <div class="navegacion-pasos">

                    <button type="button"
                            class="btn-anterior"
                            data-anterior="1">
                        ← Anterior
                    </button>

                    <button type="button"
                            class="btn-siguiente"
                            id="btn-siguiente-2">
                        Siguiente →
                    </button>

                </div>

            </div>


            <!-- ==================================================
                 PASO 3 - FECHA
            ================================================== -->

            <div class="paso-contenido"
                 data-contenido="3">

                <div class="titulo-paso">

                    <h4>Selecciona la fecha</h4>

                    <p>
                        Escoge el día en el que deseas tu cita.
                    </p>

                </div>


                <label for="fecha_reserva">
                    Fecha de la cita:
                </label>

                <input type="date"
                       id="fecha_reserva"
                       name="fecha_reserva"
                       required>


                <div class="navegacion-pasos">

                    <button type="button"
                            class="btn-anterior"
                            data-anterior="2">
                        ← Anterior
                    </button>

                    <button type="button"
                            class="btn-siguiente"
                            id="btn-siguiente-3">
                        Ver horarios →
                    </button>

                </div>

            </div>


            <!-- ==================================================
                 PASO 4 - HORA
            ================================================== -->

            <div class="paso-contenido"
                 data-contenido="4">

                <div class="titulo-paso">

                    <h4>Selecciona la hora</h4>

                    <p>
                        Las horas ocupadas aparecerán bloqueadas.
                    </p>

                </div>


                <div id="horarios-disponibles"
                     class="horarios-grid">

                    <p class="mensaje-horarios">
                        Selecciona primero una fecha.
                    </p>

                </div>


                <input type="hidden"
                       name="hora_reserva"
                       id="hora_reserva"
                       required>


                <div class="navegacion-pasos">

                    <button type="button"
                            class="btn-anterior"
                            data-anterior="3">
                        ← Anterior
                    </button>

                    <button type="button"
                            class="btn-siguiente"
                            id="btn-siguiente-4">
                        Revisar cita →
                    </button>

                </div>

            </div>


            <!-- ==================================================
                 PASO 5 - CONFIRMAR
            ================================================== -->

            <div class="paso-contenido"
                 data-contenido="5">

                <div class="titulo-paso">

                    <h4>Confirma tu cita</h4>

                    <p>
                        Revisa que todos los datos sean correctos.
                    </p>

                </div>


                <div class="resumen-cita">

                    <div class="resumen-fila">

                        <span>Cliente</span>

                        <strong id="resumen-cliente">
                            -
                        </strong>

                    </div>


                    <div class="resumen-fila">

                        <span>Identificación</span>

                        <strong id="resumen-identificacion">
                            -
                        </strong>

                    </div>


                    <div class="resumen-fila">

                        <span>Servicio</span>

                        <strong id="resumen-servicio">
                            -
                        </strong>

                    </div>


                    <div class="resumen-fila">

                        <span>Fecha</span>

                        <strong id="resumen-fecha">
                            -
                        </strong>

                    </div>


                    <div class="resumen-fila">

                        <span>Hora</span>

                        <strong id="resumen-hora">
                            -
                        </strong>

                    </div>


                    <div class="resumen-fila">

                        <span>Teléfono</span>

                        <strong id="resumen-telefono">
                            -
                        </strong>

                    </div>

                </div>


                <div class="navegacion-pasos">

                    <button type="button"
                            class="btn-anterior"
                            data-anterior="4">
                        ← Modificar
                    </button>

                    <button type="submit"
                            class="btn-confirmar">
                        ✓ Confirmar Reserva
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<footer>

    <p>
        &copy; 2025 BARBERIA BARBERAP.
        Todos los derechos reservados.
    </p>

</footer>


<script>

document.addEventListener('DOMContentLoaded', function () {

    /* ==================================================
       ELEMENTOS PRINCIPALES
    ================================================== */

    const modal = document.getElementById('modal-reserva');
    const btnReservar = document.getElementById('btn-reservar');
    const closeBtn = document.querySelector('.close-btn');

    const formReserva = document.getElementById('form-reserva');

    const identificacionInput =
        document.getElementById('cedula_reserva');

    const identificacionNuevoInput =
        document.getElementById('cedula_nuevo');

    const btnBuscarCliente =
        document.getElementById('btn-buscar-cliente');

    const btnCrearUsuario =
        document.getElementById('btn-crear-usuario');

    const searchMessage =
        document.getElementById('search-message');

    const clientSearchArea =
        document.getElementById('client-search-area');

    const clientDetailsArea =
        document.getElementById('client-details-area');

    const clienteIdInput =
        document.getElementById('cliente_id');

    const nombreInput =
        document.getElementById('nombre_reserva');

    const apellidoInput =
        document.getElementById('apellido_reserva');

    const emailInput =
        document.getElementById('email_reserva');

    const telefonoInput =
        document.getElementById('telefono_reserva');

    const identificacionNuevoGroup =
        document.getElementById('cedula-nuevo-group');

    const fechaInput =
        document.getElementById('fecha_reserva');

    const horaInput =
        document.getElementById('hora_reserva');

    const horariosDiv =
        document.getElementById('horarios-disponibles');

    const servicioSelect =
        document.getElementById('servicio');


    /* ==================================================
       PASOS
    ================================================== */

    let pasoActual = 1;


    function mostrarPaso(numero) {

        pasoActual = numero;


        document.querySelectorAll('.paso-contenido')
            .forEach(function (contenido) {

                contenido.classList.remove('activo');

            });


        const contenido =
            document.querySelector(
                '.paso-contenido[data-contenido="' + numero + '"]'
            );

        if (contenido) {
            contenido.classList.add('activo');
        }


        document.querySelectorAll('.paso')
            .forEach(function (paso) {

                const numeroPaso =
                    parseInt(paso.dataset.paso);

                paso.classList.remove('activo');
                paso.classList.remove('completado');


                if (numeroPaso === numero) {

                    paso.classList.add('activo');

                } else if (numeroPaso < numero) {

                    paso.classList.add('completado');

                }

            });

    }


    /* ==================================================
       FECHA MÍNIMA = HOY
    ================================================== */

    function establecerFechaMinima() {

        const hoy = new Date();

        const año = hoy.getFullYear();

        const mes =
            String(hoy.getMonth() + 1).padStart(2, '0');

        const dia =
            String(hoy.getDate()).padStart(2, '0');

        fechaInput.min =
            año + '-' + mes + '-' + dia;

    }


    /* ==================================================
       ABRIR MODAL
    ================================================== */

    function openModal() {

        modal.style.display = 'flex';

        resetReservationForm();

    }


    /* ==================================================
       CERRAR MODAL
    ================================================== */

    function closeModal() {

        modal.style.display = 'none';

    }


    /* ==================================================
       REINICIAR FORMULARIO
    ================================================== */

    function resetReservationForm() {

        formReserva.reset();

        clienteIdInput.value = '';

        clientSearchArea.classList.remove('hidden');

        clientDetailsArea.classList.add('hidden');

        searchMessage.textContent = '';

        searchMessage.style.color = 'gray';

        identificacionNuevoGroup.style.display = 'none';

        identificacionNuevoInput.removeAttribute('required');

        nombreInput.removeAttribute('required');
        apellidoInput.removeAttribute('required');
        emailInput.removeAttribute('required');
        telefonoInput.removeAttribute('required');

        horaInput.value = '';

        horariosDiv.innerHTML = `
            <p class="mensaje-horarios">
                Selecciona primero una fecha.
            </p>
        `;


        document.querySelectorAll('.servicio-opcion')
            .forEach(function (opcion) {

                opcion.classList.remove('seleccionado');

            });


        document.getElementById('resumen-cliente').textContent = '-';
        document.getElementById('resumen-identificacion').textContent = '-';
        document.getElementById('resumen-servicio').textContent = '-';
        document.getElementById('resumen-fecha').textContent = '-';
        document.getElementById('resumen-hora').textContent = '-';
        document.getElementById('resumen-telefono').textContent = '-';


        mostrarPaso(1);

        establecerFechaMinima();

    }


    /* ==================================================
       BUSCAR CLIENTE
    ================================================== */

    if (btnBuscarCliente) {

        btnBuscarCliente.addEventListener('click', async function () {

            const identificacion =
                identificacionInput.value.trim();


            if (identificacion === '') {

                searchMessage.textContent =
                    'Por favor, ingresa una identificación.';

                searchMessage.style.color = 'red';

                return;

            }


            searchMessage.textContent =
                'Buscando cliente...';

            searchMessage.style.color = 'gray';


            try {

                const response = await fetch(
                    'buscar_cliente.php',
                    {
                        method: 'POST',

                        headers: {
                            'Content-Type':
                                'application/x-www-form-urlencoded'
                        },

                        body:
                            'identificacion=' +
                            encodeURIComponent(identificacion)
                    }
                );


                const data = await response.json();


                if (data.success && data.cliente) {

                    searchMessage.textContent =
                        '✓ Cliente encontrado.';

                    searchMessage.style.color =
                        'green';


                    nombreInput.value =
                        data.cliente.nombre || '';


                    apellidoInput.value =
                        data.cliente.apellido || '';


                    identificacionInput.value =
                        data.cliente.identificacion || identificacion;


                    emailInput.value =
                        data.cliente.email || '';


                    telefonoInput.value =
                        data.cliente.telefono || '';


                    clienteIdInput.value =
                        data.cliente.id;


                    clientSearchArea.classList.add('hidden');

                    clientDetailsArea.classList.remove('hidden');


                    nombreInput.setAttribute(
                        'required',
                        'required'
                    );

                    apellidoInput.setAttribute(
                        'required',
                        'required'
                    );

                    emailInput.setAttribute(
                        'required',
                        'required'
                    );

                    telefonoInput.setAttribute(
                        'required',
                        'required'
                    );


                    identificacionNuevoInput.removeAttribute(
                        'required'
                    );

                    identificacionNuevoGroup.style.display =
                        'none';


                } else {

                    searchMessage.textContent =
                        'Cliente no encontrado. Puedes crear un nuevo cliente.';

                    searchMessage.style.color =
                        'orange';

                }


            } catch (error) {

                console.error(
                    'Error al buscar cliente:',
                    error
                );

                searchMessage.textContent =
                    'Error al buscar cliente. Intenta nuevamente.';

                searchMessage.style.color =
                    'red';

            }

        });

    }


    /* ==================================================
       CREAR NUEVO CLIENTE
    ================================================== */

    if (btnCrearUsuario) {

        btnCrearUsuario.addEventListener('click', function () {

            clientSearchArea.classList.add('hidden');

            clientDetailsArea.classList.remove('hidden');

            searchMessage.textContent = '';

            clienteIdInput.value = '';


            identificacionNuevoGroup.style.display =
                'block';


            /*
             * CORRECCIÓN DEL ERROR QUE TENÍAS:
             * antes utilizabas cedulaInput,
             * pero esa variable no existía.
             */

            identificacionNuevoInput.value =
                identificacionInput.value;


            identificacionNuevoInput.setAttribute(
                'required',
                'required'
            );


            nombreInput.setAttribute(
                'required',
                'required'
            );

            apellidoInput.setAttribute(
                'required',
                'required'
            );

            emailInput.setAttribute(
                'required',
                'required'
            );

            telefonoInput.setAttribute(
                'required',
                'required'
            );

        });

    }


    /* ==================================================
       SELECCIONAR SERVICIO
    ================================================== */

    document.querySelectorAll('.servicio-opcion')
        .forEach(function (opcion) {

            opcion.addEventListener('click', function () {

                document.querySelectorAll('.servicio-opcion')
                    .forEach(function (item) {

                        item.classList.remove(
                            'seleccionado'
                        );

                    });


                this.classList.add('seleccionado');


                servicioSelect.value =
                    this.dataset.servicio;

            });

        });


    /* ==================================================
       SIGUIENTE - PASO 1
    ================================================== */

    document.getElementById('btn-siguiente-1')
        .addEventListener('click', function () {

            if (
                clientDetailsArea.classList.contains('hidden')
            ) {

                alert(
                    'Primero debes buscar un cliente o crear uno nuevo.'
                );

                return;

            }


            if (
                !nombreInput.value.trim() ||
                !apellidoInput.value.trim() ||
                !emailInput.value.trim() ||
                !telefonoInput.value.trim()
            ) {

                alert(
                    'Completa todos los datos del cliente.'
                );

                return;

            }


            mostrarPaso(2);

        });


    /* ==================================================
       SIGUIENTE - PASO 2
    ================================================== */

    document.getElementById('btn-siguiente-2')
        .addEventListener('click', function () {

            if (!servicioSelect.value) {

                alert(
                    'Selecciona un servicio antes de continuar.'
                );

                return;

            }


            mostrarPaso(3);

        });


    /* ==================================================
       SIGUIENTE - PASO 3
    ================================================== */

    document.getElementById('btn-siguiente-3')
        .addEventListener('click', function () {

            if (!fechaInput.value) {

                alert(
                    'Selecciona una fecha.'
                );

                return;

            }


            cargarHorarios(fechaInput.value);

        });


    /* ==================================================
       SIGUIENTE - PASO 4
    ================================================== */

    document.getElementById('btn-siguiente-4')
        .addEventListener('click', function () {

            if (!horaInput.value) {

                alert(
                    'Selecciona un horario disponible.'
                );

                return;

            }


            actualizarResumen();

            mostrarPaso(5);

        });


    /* ==================================================
       BOTONES ANTERIORES
    ================================================== */

    document.querySelectorAll('[data-anterior]')
        .forEach(function (boton) {

            boton.addEventListener('click', function () {

                const anterior =
                    parseInt(this.dataset.anterior);

                mostrarPaso(anterior);

            });

        });


    /* ==================================================
       CARGAR HORARIOS
    ================================================== */

    function cargarHorarios(fecha) {

        horaInput.value = '';


        horariosDiv.innerHTML = `
            <p class="mensaje-horarios">
                Consultando horarios disponibles...
            </p>
        `;


        fetch(
            'obtener_horarios.php?fecha=' +
            encodeURIComponent(fecha)
        )

        .then(function (response) {

            if (!response.ok) {
                throw new Error(
                    'Error HTTP ' + response.status
                );
            }

            return response.json();

        })

        .then(function (data) {

            if (!data.success) {

                horariosDiv.innerHTML = `
                    <p class="mensaje-horarios">
                        No se pudieron consultar los horarios.
                    </p>
                `;

                return;

            }


            if (
                !data.horarios ||
                data.horarios.length === 0
            ) {

                horariosDiv.innerHTML = `
                    <p class="mensaje-horarios">
                        No hay horarios disponibles para esta fecha.
                    </p>
                `;

                return;

            }


            horariosDiv.innerHTML = '';


            data.horarios.forEach(function (item) {

                const boton =
                    document.createElement('button');


                boton.type = 'button';


                if (item.ocupada) {

                    boton.className =
                        'btn-horario ocupado';

                    boton.textContent =
                        item.hora + ' 🔒';

                    boton.disabled = true;

                } else {

                    boton.className =
                        'btn-horario';

                    boton.textContent =
                        item.hora;


                    boton.addEventListener(
                        'click',
                        function () {

                            document
                                .querySelectorAll(
                                    '.btn-horario'
                                )
                                .forEach(function (btn) {

                                    btn.classList.remove(
                                        'seleccionado'
                                    );

                                });


                            this.classList.add(
                                'seleccionado'
                            );


                            horaInput.value =
                                item.hora;

                        }
                    );

                }


                horariosDiv.appendChild(boton);

            });


            mostrarPaso(4);

        })

        .catch(function (error) {

            console.error(error);


            horariosDiv.innerHTML = `
                <p class="mensaje-horarios">
                    Ocurrió un error al consultar los horarios.
                </p>
            `;

        });

    }


    /* ==================================================
       CAMBIO DE FECHA
    ================================================== */

    fechaInput.addEventListener(
        'change',
        function () {

            horaInput.value = '';

            horariosDiv.innerHTML = `
                <p class="mensaje-horarios">
                    Presiona "Ver horarios" para consultar
                    las horas disponibles.
                </p>
            `;

        }
    );


    /* ==================================================
       ACTUALIZAR RESUMEN
    ================================================== */

    function actualizarResumen() {

        const nombreCompleto =
            nombreInput.value.trim() +
            ' ' +
            apellidoInput.value.trim();


        document.getElementById(
            'resumen-cliente'
        ).textContent =
            nombreCompleto;


        document.getElementById(
            'resumen-identificacion'
        ).textContent =
            identificacionNuevoInput.value ||
            identificacionInput.value ||
            '-';


        const opcionSeleccionada =
            document.querySelector(
                '.servicio-opcion.seleccionado'
            );


        if (opcionSeleccionada) {

            document.getElementById(
                'resumen-servicio'
            ).textContent =
                opcionSeleccionada.dataset.nombre;

        }


        if (fechaInput.value) {

            const partes =
                fechaInput.value.split('-');


            document.getElementById(
                'resumen-fecha'
            ).textContent =
                partes[2] +
                '/' +
                partes[1] +
                '/' +
                partes[0];

        }


        document.getElementById(
            'resumen-hora'
        ).textContent =
            horaInput.value || '-';


        document.getElementById(
            'resumen-telefono'
        ).textContent =
            telefonoInput.value || '-';

    }


    /* ==================================================
       ABRIR / CERRAR
    ================================================== */

    if (btnReservar) {

        btnReservar.addEventListener(
            'click',
            openModal
        );

    }


    if (closeBtn) {

        closeBtn.addEventListener(
            'click',
            closeModal
        );

    }


    window.addEventListener(
        'click',
        function (event) {

            if (event.target === modal) {

                closeModal();

            }

        }
    );


    /* ==================================================
       VALIDACIÓN FINAL
    ================================================== */

    formReserva.addEventListener(
        'submit',
        function (event) {

            if (!horaInput.value) {

                event.preventDefault();

                alert(
                    'Selecciona una hora disponible.'
                );

                mostrarPaso(4);

                return;

            }


            if (!servicioSelect.value) {

                event.preventDefault();

                alert(
                    'Selecciona un servicio.'
                );

                mostrarPaso(2);

                return;

            }


            if (!fechaInput.value) {

                event.preventDefault();

                alert(
                    'Selecciona una fecha.'
                );

                mostrarPaso(3);

                return;

            }

        }
    );


    /* ==================================================
       FORMULARIO DE CONTACTO
    ================================================== */

    const formContacto =
        document.getElementById('form-contacto');


    if (formContacto) {

        formContacto.addEventListener(
            'submit',
            async function (event) {

                event.preventDefault();


                const formData =
                    new FormData(formContacto);


                try {

                    const response =
                        await fetch(
                            'procesar_contacto.php',
                            {
                                method: 'POST',
                                body: formData
                            }
                        );


                    const data =
                        await response.json();


                    if (data.success) {

                        alert(
                            data.message ||
                            '¡Mensaje enviado! Gracias por contactarnos.'
                        );

                        formContacto.reset();

                    } else {

                        alert(
                            data.message ||
                            'Error al enviar el mensaje.'
                        );

                    }

                } catch (error) {

                    console.error(error);

                    alert(
                        'Error al enviar el mensaje. Por favor, inténtalo nuevamente.'
                    );

                }

            }
        );

    }


    /* ==================================================
       INICIALIZACIÓN
    ================================================== */

    establecerFechaMinima();

});

</script>

</body>
</html>