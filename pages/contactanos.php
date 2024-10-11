<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos</title>
    <script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>
    <script type="text/javascript">
        (function(){
            emailjs.init("Z522bp7P7FXbGUrB0"); 
        })();
    </script>
    <style>
        :root {
            --contact-text-color: #333;
            --contact-title-color: #d35400;
            --contact-subtitle-color: #5d4037;
            --contact-button-bg-color: #d35400;
            --contact-button-hover-bg-color: #e67e22;
            --contact-input-bg-color: #f7f7f7;
            --contact-box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --contact-bg-color: #ffffff; /* Fondo suave */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--contact-bg-color); /* Fondo suave */
            color: var(--contact-text-color); /* Color de texto principal */
        }

        #contact-section90 {
            min-height: 50vh;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-start;
            border-radius: 12px;
            box-shadow: var(--contact-box-shadow); /* Sombra sutil */
        }

        .contact-left-content {
            text-align: center;
            padding: 10px;
            max-width: 800px;
        }

        .contact-left-content h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--contact-title-color);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .contact-left-content h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: var(--contact-subtitle-color);
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .contact-right-content {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: var(--contact-box-shadow); /* Sombra ligera */
            margin-top: 20px;
        }

        .contact-right-content form {
            width: 100%;
        }

        .contact-right-content input,
        .contact-right-content textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            background-color: var(--contact-input-bg-color);
        }

        .contact-right-content button {
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: var(--contact-button-bg-color); /* Color del botón en tono naranja */
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .contact-right-content button:hover {
            background-color: var(--contact-button-hover-bg-color); /* Color más claro al hacer hover */
        }

        .contact-whatsapp-form h2 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--contact-subtitle-color); /* Color de texto principal */
        }

        .contact-whatsapp-form p {
            font-size: 1rem;
            margin-bottom: 20px;
            color: #7e736d; /* Texto secundario */
        }

        .contact-tab-group {
            display: flex;
            width: 100%;
            margin-bottom: 20px;
            list-style: none;
            padding: 0;
            border-bottom: 2px solid var(--contact-title-color); /* Color destacado */
        }

        .contact-tab-group li {
            flex: 1;
            text-align: center;
        }

        .contact-tab-group li a {
            text-decoration: none;
            padding: 10px;
            display: block;
            font-weight: bold;
            color: var(--contact-subtitle-color);
        }

        .contact-tab-group li.active a {
            background-color: var(--contact-title-color); /* Color activo */
            color: white;
        }

        .contact-tab-content {
            width: 100%;
        }

        @media (min-width: 768px) {
            #contact-section90 {
                flex-direction: row;
                padding: 20px 100px;
            }

            .contact-left-content h1 {
                font-size: 2.5rem;
            }

            .contact-left-content h3 {
                font-size: 1.2rem;
            }

            .contact-right-content {
                max-width: 500px;
                margin-top: 0;
            }

            .contact-tab-group {
                justify-content: flex-start;
            }
        }

        @media (max-width: 767px) {
            .contact-left-content h1 {
                font-size: 1.8rem;
            }

            .contact-left-content h3 {
                font-size: 1rem;
            }

            .contact-right-content {
                padding: 15px;
            }

            .contact-right-content input,
            .contact-right-content textarea {
                padding: 10px;
            }

            .contact-right-content button {
                font-size: 1rem;
                padding: 10px;
            }

            .contact-whatsapp-form h2 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
<section id="contact-section90">
    <div class="contact-left-content">
        <h1>Contact us</h1>
        <h3>If you have any questions, suggestions or concerns, please do not hesitate to contact us. At Accesories Para Acordeones De La Rosa, we value every consultation and are committed to providing you with the best possible care. <br><br>
        If you are interested in making a purchase, have questions about our products or would like to request a quote for a larger order, we invite you to write to us. You can contact us through WhatsApp or send us an Email</h3>
    </div>

    <div class="contact-right-content">
        <ul class="contact-tab-group">
            <li class="contact-tab active"><a href="#formContact">Mail Form</a></li>
            <li class="contact-tab"><a href="#formWhatsApp">Contact us by WhatsApp</a></li>
        </ul>

        <div class="contact-tab-content">
            <div id="formContact">
                <form id="emailForm">
                    <label for="from_email">Your email:</label>
                    <input type="email" id="from_email" name="from_email" required placeholder="example@example.com">

                    <label for="phone">Your phone:</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required placeholder="1234567890">

                    <label for="subject">Affair:</label>
                    <input type="text" id="subject" name="subject" required>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>

                    <button type="submit">Send mail</button>
                </form>
            </div>

            <div id="formWhatsApp" style="display: none;" class="contact-whatsapp-form">
                <h2>Our WhatsApp</h2>
                <p>Press the button to contact us:</p>
                <a aria-label="Chat on WhatsApp" href="https://wa.me/14088166630?text=¡Hola!%20Tengo%20una%20pregunta%20de%20Accesorios%20para%20acordeones%20de%20la%20Rosa" target="_blank">
                    <img alt="Chat on WhatsApp" src="../assets/img/WhatsAppButtonGreenSmall.png" />
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    const contactTabLinks = document.querySelectorAll('.contact-tab a');

    contactTabLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            contactTabLinks.forEach(t => t.parentElement.classList.remove('active'));
            this.parentElement.classList.add('active');

            const targetId = this.getAttribute('href').substring(1);
            document.querySelectorAll('.contact-tab-content > div').forEach(div => {
                div.style.display = 'none';
            });
            document.getElementById(targetId).style.display = 'block';
        });
    });

    document.getElementById('emailForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const serviceID = 'service_47rf6k7';
        const templateID = 'template_31uaonj';

        emailjs.sendForm(serviceID, templateID, this)
            .then(() => {
                alert('Correo enviado exitosamente');
            }, (err) => {
                alert(JSON.stringify(err));
            });
    });
</script>

</body>
</html>



