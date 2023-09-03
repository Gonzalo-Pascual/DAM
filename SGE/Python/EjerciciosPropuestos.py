'''1. Encuentra tres valores que tengan los tipos int, str y float. Comprueba con Python que sus
valores son de los tipos pedidos.'''
def ejercicio1():
    print("=========== Ejercicio 1 ===========")
    print(type(17))
    print(type("HolaMundo"))
    print(type(12.12))


'''2. Escribe un código que imprima tu nombre y edad, primero en distintas líneas y luego todo
en la misma línea, así: Pedro Martín, edad: 25.'''
def ejercicio2():
    print("\n\n=========== Ejercicio 2 ===========")
    nombre = ("Gonzalo Pascual")
    edad = (20)
    print("Nombre: " , (nombre) , "\nEdad: ", (edad), "\n")
    print("Nombre: " , nombre , ", Edad: ",edad)


'''3. Calcular y mostrar por pantalla el área de un cuadrado:
a) Utilizando dos variables, una para almacenar la longitud del lado y otra para
almacenar el área.
b) Utilizando una única variable para almacenar la longitud del lado.'''
def ejercicio3():
    print("\n\n=========== Ejercicio 3 ===========")
    lado = int(input("Longitud del lado: "))
    area = lado*lado
    print("Area(dos variables): ",area)
    print ("Area(una variable): ", lado*lado)


'''4. Escribe un programa en Python que calcule el impuesto que debe pagar un contribuyente a
partir de sus ingresos anuales y el número de hijos. El impuesto a pagar es un tercio del ingreso
imponible, siendo este último igual a los ingresos totales menos una deducción personal de
600€ y otra deducción de 60€ por hijo.'''
def ejercicio4():
    print("\n\n=========== Ejercicio 4 ===========")
    sueldo = int(input("Sueldo anual: "))
    hijos = int(input("Cantidad de hijos: "))
    total = (sueldo/3)-600-(60*hijos)
    print("el impuesto total a pagar es: ",round(total, 2), "€")


'''5. Escribe un programa que dada una hora (expresada en hora, minutos y segundos) muestre
por pantalla el total de segundos transcurridos desde la última medianoche y los que quedan
para la siguiente medianoche.'''
def ejercicio5():
    print("\n\n=========== Ejercicio 5 ===========")
    hor = int(input(("Hora: ")))
    min = int(input(("Minutos: ")))
    seg = int(input(("Segundos: ")))
    hor = int(hor*60*60)
    min = int(min*60)
    print("Han pasado: ", (hor+min+seg), "segundos")


'''6. Una industria mantiene una flota de camiones para repartir productos. En cada viaje, el
conductor anota la distancia recorrida en kilómetros, los litros de gasoil utilizados, el coste del
gasoil y los demás costes de mantenimiento del camión. Como parte del proceso de
contabilidad, el controlador necesita calcular, para cada camión y para cada viaje, los
kilómetros recorridos por litro, el coste total del viaje y el coste por kilómetro. Diseña un
programa sencillo que lleve a cabo estos cálculos para un camión en un viaje.'''
def ejercicio6():
    print("\n\n=========== Ejercicio 6 ===========")
    km = float(input(("Kilometros: ")))
    gas = float(input(("Litros de gasoil: ")))
    precio = float(1.624)
    print("Kilometros recorridos por litro: ", round(km/gas, 2))
    print("Coste del viaje: ", round(gas*precio, 2), "€")
    print("Coste por kilometro: ", round(km/(gas*precio), 2), "€")


'''7. Escribe un programa que lea una longitud en kilómetros y muestre su equivalencia en Hm,
Dm y m.'''
def ejercicio7():
    print("\n\n=========== Ejercicio 7 ===========")
    km = (input(("Introduce los kilometros: ")))
    print("En Hectometros: ", km*10, "\nEn Decimentros", km*10000, "\nEn metros", km*1000)


'''8. Python permite convertir elementos de un tipo en otro. Lleva a cabo las siguientes
conversiones y comenta los resultados: texto_numerico = "45" int (texto_numerico) int
("Hola") int (3.99999) float (34)'''
def ejercicio8():
    print("\n\n=========== Ejercicio 8 ===========")
    print(str(45), type(str(45)))
    print(int("1234"), type(int("1234")))
    #print(int("Hola mundo"), type(int("Hola mundo"))) Da errores de conversión
    print(int(3.99999), type(int(3.99999)))
    print(float(34), type(float(34)))


'''9. Escribe un programa que lea los lados de un rectángulo, calcule su área y perímetro y los
muestre por pantalla.'''
def ejercicio9():
    print("\n\n=========== Ejercicio 9 ===========")
    alto = int(input("Introduce el alto: "))
    ancho = int(input("Introduce el ancho: )"))
    print("Area: ", alto*ancho, "\nPerimetro: ", (alto*2)+(ancho*2))


'''10. Escribe un programa que, a partir de 3 números reales, calcule su media, suma total y
producto total y muestre todos estos datos por pantalla.'''
def ejercicio10():
    print("\n\n=========== Ejercicio 10 ===========")
    x = 3
    y = 4
    z = 9


'''11. La temperatura expresada en grados centígrados TC, se puede convertir a grados
Fahrenheit (TF) mediante la siguiente fórmula: TF = 9*TC/5 + 32.Escribe un programa que pida
al usuario la temperatura en grados Fahrenheit y devuelva la temperatura en grados
Centígrados.'''
def ejercicio11():
    print("\n\n=========== Ejercicio 11 ===========")
    temp = float(input("Esacriba la temeratura en Fahrenheit: "))
    print("La temperatura en grados centigrados es: ", round((temp-32)*5/9, 2))


'''12. Transcribe el siguiente programa, ejecútalo y comenta los resultados obtenidos:
a = 3/2
b = 3.0 / 2
c = 3 // 2
print ('a= ', a, 'b= ', b, 'c= ', c)'''
def ejercicio12():
    print("\n\n=========== Ejercicio 12 ===========")
    a = 3/2
    b = 3.0/2
    c = 3//2
    print ('a= ', a, '\nb= ', b, '\nc= ', c)


'''13. El salario base de un vendedor es de 2.000 euros mensuales. A este salario se le suma un
3% de comisión sobre el total de las ventas que ha realizado, pero al total obtenido hay que
descontarle un 32% del IRPF. Escribe un programa que lea el importe de las ventas que ha
realizado el venderdor durante el último mes y escriba el salario neto que cobrará ese mes.'''
def ejercicio13():
    print("\n\n=========== Ejercicio 13 ===========")
    base= 2000
    comision = float(input("Dinero en ventas realizadas: "))
    total= base+(comision*0.03)
    print("El salario neto es: ", round(total-(total*0.32),2)) 


'''14. Se desea conocer el importe en Libras Esterlinas (GBP) al cambio de una cantidad en Euros
(EUR). Escribe un programa que, a partir de una cierta cantidad en euros y del tipo de cambio
del día, muestre el equivalente en libras teniendo en cuenta que la casa de cambio retiene una
comisión del 2% sobre el total de la operación.'''
def ejercicio14():
    print("\n\n=========== Ejercicio 14 ===========")

    dinero = float(input("Ingrese la cantidad de euros: "))
    if (dinero <= 2000):
        print("Cantidad en Libras: ",dinero*0.88)
    else:
        print("Cantidad en Libras: ",(dinero*0.88) - (dinero*0.88)*0.2)


'''15. En Python es posible hacer operaciones con variables de tipo str. Vamos a probarlo
tecleando:
fruta = " ciruela "
tipo = " claudia "
print (fruta + tipo)
a) ¿Qué se obtiene? ¿Qué es lo que hace la operación + con las cadenas?
Teclea ahora:
print fruta*3
b) ¿Qué se obtiene? ¿Qué hace la operación * con las cadenas?'''
def ejercicio15():
    print("\n\n=========== Ejercicio 15 ===========")
    fruta = " ciruela "
    tipo = " claudia "
    print (fruta + tipo)# las concatena
    print (fruta*3)# lo escribe 3 veces