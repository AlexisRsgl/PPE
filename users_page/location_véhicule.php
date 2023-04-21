<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="flex">
            <div class="container">
                <nav class="side-nav">
                <ul class="nav-menu">
                    <li class="nav-item active"><a href="gestion_utilisateur.php"><i class="fas fa-tachometer-alt"></i><span class="menu-text">Gestion utilisateur</span></a></li>
                    <div class="center_submit_nav">
                        <button class="submit_deconnexion">Déconnexion</button>
                    </div>
                </ul>
            </div>
            <section class="section_table">
                <table>
                    <tr>
                        <th>Véhicules</th>
                        <th>Choisir</th>
                    </tr>
                    <tr>
                        <td>Alfa Roméo MiTo</td>
                        <td><button><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAFJUlEQVRoge2ZXVCUVRzGn3cXFlkUdQFxWR1n+tLGGaYZmboNsjLTxo+E1OxLTRh0aqy7ppm3semuCwss/GCw0UmBUjOZaQomL0PIujBCSVMgxwLEQIh33/N/ulhA2V32fZddFmfkf8NyZs85v+f8n3POnnOA6ZiO+zu0eDRSzWpnj7nocXEgH8JlQi4h6SVlppCgxn5S/hJBKyDNytQaBtPPNuqaLlMqoJKNC03RSkm+LKCPJIQESZAS+IzA/3fKCYGAlA4FHjH9qlzPWNmRUAGV/DlLCT8k5DWSLgmBtIIfU2YoTSrhUO/r6au7Jl3AQZ7fRPJTUnkCQDHBj9YHpVsJdu7JWnVsUgRUsCnZCcc+kttIQTzhR+uREEFF17zru/ZrO/xxE1DBJncSHLVCPjeZ8KPlwroZkrRBz1k9YMXmsDPyCYUPtLPyNoZO6ReqXTELcMKxL6HwJIQCgsv75mp7rfgiWugQz28WypGEw9/dF+Slvb6Nx6MWcJg/ZRhM+p2UzKmCH26jJ9nJxR/nbAq7xI5rIUOSProH4EGKZ8iQD6LKwAH+uoBi/BGHTSpW+JFJbfhNPrz/wVeu2coAxdiZKHjTNNDWfAGDA4Nh4QWEkC6HgyW2MqCTDq86d1XABZMN7zf9aDh8EtcuXMLsLA+e2VGElFluBC8aJCHCzpsPuBfVaIUqYgbmm41PJALeNA3UV51Ae0sbAODW392oP1ATHj7Qty/9yr/LLC0kDuQnAv6HqpPoaL0cat+wc2G0r4Lg7yeFNCCSR2JybfPFNyHw6VkePLl1XSR4kLDOAMlH7MAP3B7Ab+d+gen3T9g2IzEnOwNPF2+Aa1ZqBHhCwMXWGSC8lvB9/Tj+ySF0dd7AokcfwqrtG+FwOic88gVb1yM5zQI+8NdrIwPDx8AItqktq0JX5w0AwNWWNpw5cAzKb0xo5Jdvf9F65EfaBWdZCrDl+aA6f7ZcwplD1VBmsJ3Gn7BzsjNQ8MY6JKfNsAsPMrjncBkA+60m7NqSLcjMmTem3tWWNtQdrIZ/WMSIberD2SbTg/zX10YFLySE0mdDgFy3Wm1SZrqxpvRVZASJaG+9jO8qa2H6zWHPnwqxTXqmB09tWwfXTNu2uXtnvm4tQHDRzlI5Iy0VL5Rsgcc7VkRH62V8X/VVBM+vnyg8FNFqJwNNdtf5gIhN8HizQkTEyzajOzMJUJosBShTa4hmk3KlufF8caiIYPgYbDNabkIaLAUMpp9tpLA9mh02xZ2KFW8WYa43c9LgBbyWu7S32VKArumiNDlqFz7QiSDFnYpntxdi7vw7IuIIDxBHw11Fhj0PmH5VTtKI9jDicqdi+dYN8Piy4fFlxzRhZWxfQ5pS5eFYxz0T6711n0FQHMtJKvIPM9vwIKXs69zdu8Jxjn+tojneI6XrHoDv9kc4E48rQJ+9okcEu6YYHgRLTue9O+6lb8SLrT1Zq46JoGKq4JWw/ETuOzWRGC1v5i7N+69UyJMJhwfO3LrZ97YVn6WAGq1QpaqkzUKpSxS8kN+KkVb4Y75uxiwAAPSc1QO35nevIfB5ImzT29O39nTeDsubaWACDxxvdX5ZREFZ8K1dHOD/IVhq5fngsJWBu2Ovb+NxpRlLKNwn4FA8NilSypxOLIkWHojxka+4/bAPJnYKuZnkwmjgFdCukUc0pcprHtvdOVGGuDyz6tQd7VcW5JEsoGCZgIsp9BEMnK+p+kl0KOIiKE0mpCF3aW9zPJ5Zp2M67vf4H0ApRBRylukUAAAAAElFTkSuQmCC" class="button_table"></button></td>
                    </tr>
                </table>
            </section>
        </div>
       
        <footer></footer>
        <script>
            $(function() {
			$("li").click(function(e) {
			  e.preventDefault();
			  $("li").removeClass("active");
			  $(this).addClass("active");
			});
		});
        </script>

    </body>
</html>