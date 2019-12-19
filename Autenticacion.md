# Autenticacion en Laravel 5.0 

El presente mini-documento es una introducción para que los equipos de programación sepan como utilizar la autenticacion creada por el Team 1.

## 1.1: Autenticacion en Controladores

Para verificar si un Usuario esta logeado en un controlador se debe utilizar una funcion
```
public function __construct()
```
y se debe utilizar el **middleware('auth')**
Ejemplo: 

```
public function __construct()
{
    $this->middleware('auth');
}
```

OJO: algunos controladores ya tienen implementada la funcion **no duplicar codigo** 

## 1.2: Autenticacion en Funciones
Se debe verificar si el usuario logeado tiene acceso al CRUD (Controlador) se debe colocar :
* Colocar un `Request $request` en las funciones get **(index, create, edit,destroy,etc)** 
* Dentro de la funcion se debe colocar **$request->user()->authorizeRole('menu_admin_roles');** esta linea verifica si el usuario logeado puede hacer la accion por ejemplo **"menu_admin_roles"**

**OJO:** Las acciones las pueden encontrar en el navbar o en la tabla item

Ejemplo
```
public function index(Request $request)
{
    $request->user()->authorizeRole('menu_admin_roles');
    $roles = Role::all();
    $title = 'Listado de roles';
    return view('role.index', [
        'title' => $title,
        'roles' => $roles
    ]);
}
```
## 1.3: Obtener Empresa de un Usuario Logeado
Para obtener la empresa a la que pertenece un Usuario logeado se debe colocar un `Request $request` en la funcion donde se requiera empresa
Se obtiene el usuario logeado utilizando `$request->user() ` con esto se tiene todo el objeto usuario y apartir del usuario se obtiene todo el objeto empresa usando `$request->user()->empresa` con este objeto empresa se puede accder a cualquier atributo o metodo de la clase empresa

Codigo Ejemplo
```
public function edit(Request $request,$id){
    $request->user->empresa->EMP_CODIGO
}
```

## 1.4: Autenticacion en View
* Para verificar si un Usuario esta logeado se utiliza `Auth::check()` esto se puede utilizar dentro de un if

Codigo Ejemplo
```
@if(Auth::check())
	//content
@endif
```
* Para verificar si un usuario logeado tiene acceso a una accion se utiliza `Auth::user()->authorizeAccion("menu_proceso")` tambien se lo puede utilizar dentro de un if

Codigo Ejemplo
```
    @if(Auth::user()->authorizeAccion("menu_proceso"))
        //content
    @endif
```

**Nota** Al utilizar `Auth::user()` se accede a todo el objeto usuario y se puede utilizar todos los atributos y metodos de la clase User
