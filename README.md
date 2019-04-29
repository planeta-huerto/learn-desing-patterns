# learn-desing-patterns
Ejemplos de patrones de diseño en php hecho por el equipo de Planeta Huerto.

Requisitos
-------
Estos ejemplos funcionan con PHP 7.3

Todos los ejemplos son ejecutables por linea de comandos

Todos los ejemplos desarrollados van acompañados por test unitarios.

Para instalar dependencias

```
composer install -o
```

Para ejecutar los test:

```
./vendor/bin/phpunit
```

Patrones explicados
-----
* Factory
* Builder
* Decorator
* Chain
* Specification
* Command Handler
* Resolver
* Calculator
* Locator o Service Locator


Decorator
-----

El patrón Decorator nos permite modificar, retirar o añadir responsabilidades a un objeto de manera dinámica.

CommandHandler
-----

El patrón command Handler se divide en dos clases: 

* Command: Es la clase que encapsula la información necesaria para ejecutar la acción. En la mayoría de los casos son simples DTOs.

* CommandHandler/Handler: Es la clase que contiene la Lógica a ejecutar. Es importante que esta clase ejecute una y solo una acción.

Por convención, todos los handlers debería tener un método conocido para ejecutar los comandos como : handle, execute igualmente tambien podemos usar el magic method __invoke.


Specification
-----

Construye una especificación clara de las reglas de negocios, donde los objetos se pueden verificar. La clase de especificación compuesta tiene un método que devuelve verdadero o falso dependiendo de si el objeto dado satisface la especificación.


Resolver
-------
