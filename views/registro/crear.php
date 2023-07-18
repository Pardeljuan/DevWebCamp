<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo; ?></h2>
    <p class="registro__descripcion">Elige tu Plan</p>

    <div <?php aos_animacion() ?> class="paquetes__grid">
        <div class="paquete">
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Pase Online con accesso a DevWebCamp</li>
            </ul>
            <p class="paquete__precio">$0</p>
            <form action="/finalizar-registro/gratis" method="POST">
                <input type="submit" class="paquetes__submit" name="" id="" value="Inscripcion Gratis">
            </form>
        </div>

        <div class="paquete">
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Accesso presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase valido para los dos dias</li>
                <li class="paquete__elemento">Accesso a Talleres y Conferencias</li>
                <li class="paquete__elemento">Accesso a las grabaciones</li>
                <li class="paquete__elemento">Prenda de regalo</li>
                <li class="paquete__elemento">Comida y bebida</li>
            </ul>
            <p class="paquete__precio">$199</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>

        </div>

        <div class="paquete">
            <h3 class="paquete__nombre">Pase Virtual</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Pase Online con accesso a DevWebCamp</li>
                <li class="paquete__elemento">Pase valido para los dos dias</li>
                <li class="paquete__elemento">Enlace a Talleres y Conferencias</li>
                <li class="paquete__elemento">Accesso a las grabaciones</li>
            </ul>
            <p class="paquete__precio">$60</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container-virtual"></div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="https://www.paypal.com/sdk/js?client-id=AUKNb7eMmiwL_j6wpUNJ2pkeYJlS37LGWjEs4dCG0gbwigFMH2XO8xlaFcDaJjpgjpmmSj2I5FXYOQmo&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',

            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "description": "1",
                        "amount": {
                            "currency_code": "USD",
                            "value": 240.79,
                            "breakdown": {
                                "item_total": {
                                    "currency_code": "USD",
                                    "value": 199
                                },
                                "shipping": {
                                    "currency_code": "USD",
                                    "value": 0
                                },
                                "tax_total": {
                                    "currency_code": "USD",
                                    "value": 41.79
                                }
                            }
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    const datos = new FormData();
                    datos.append('paquete_id', orderData.purchase_units[0].description);
                    datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                    fetch('/finalizar-registro/pagar', {
                            method: 'POST',
                            body: datos
                        })
                        .then(respuesta => respuesta.json())
                        .then(resultado => {
                            if (resultado.resultado) {
                                actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                            }
                        })
                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');

        // Pase virtual
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',

            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "description": "2",
                        "amount": {
                            "currency_code": "USD",
                            "value": 49
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    const datos = new FormData();
                    datos.append('paquete_id', orderData.purchase_units[0].description);
                    datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                    fetch('/finalizar-registro/pagar', {
                            method: 'POST',
                            body: datos
                        })
                        .then(respuesta => respuesta.json())
                        .then(resultado => {
                            if (resultado.resultado) {
                                actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                            }
                        })

                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container-virtual');
    }
    initPayPalButton();
</script>