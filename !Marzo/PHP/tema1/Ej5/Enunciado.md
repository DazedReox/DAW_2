fechas suma y resta
Dado que una fecha se guarda en formato de tiempo, o se puede convertir a dicho formato en caso de que sea una cadena, parece lógico pensar que se puede añadir o restar tiempo a las fechas. Es así, aunque no es tan fácil como sumar o restar directamente una cierta cantidad de días a la fecha base.
En este ejercicio se pide que averigües cómo se puede sumar o restar una cantidad de tiempo a una fecha y que apliques ese conocimiento para mostrar por pantalla la fecha de hoy, la de ayer y la de mañana.
Para poder resolver el ejercicio tienes que investigar las funciones date() y strtotime()
La función strtotime(), en principio, sirve para convertir una variable de tipo string a otra de tipo fecha, pero la propia función permite realizar operaciones de suma o resta de cantidades de tiempo para obtener una fecha distinta. Ten en cuenta que, para sumar o restar a la fecha, deberás convertirla a formato tiempo, pero para mostrarla por pantalla necesitarás volverla a convertir a formato cadena.
Ejemplo:

    strtotime(fecha1) la convertiría en una variable de tipo fecha, pero la fecha seguiría siendo la misma;
    strtotime(+1year, fecha1) la convierte en un valor de tipo fecha, pero sumándole un año;
    strtotime(-2month, fecha1) la convierte en un valor de tipo fecha, pero restándole dos meses. 

