import math #matemáticas
from ejemplo_modulo import mod_horas, mod_minutos, mod_segundos, circun


#Ejercicio_1
'''1. Implementa una función “fuerza” que retorne el valor de la fuerza en función de
los valores de masa y aceleración recibidos como parámetros. Implementa,
posteriormente, un programa probador que, leyendo de teclado los valores
necesarios, invoque a la función “fuerza” y muestre por pantalla el valor de la
fuerza a partir de una masa y aceleración dadas.'''
def ejercicio1():
    print('Ejercicio nº 1')
    ##Fuerza=masa*aceleración
    def fuerza(masa,aceleracion):
        return masa*aceleracion
    a=float(input("Introduce la masa:\n\t"))
    b=float(input("Introduce la aceleración:\n\t"))
    #definiendo una función
    print('La fuerza es: \n\t%.2f' %fuerza(a,b))
    #utilizando una función anónima
    c=lambda e,f:e*f
    print('La fuerza es: \n\t%.2f' %c(a,b))



#Ejercicio_2
'''2. Implementa un programa modularizado que, leyendo de teclado los valores
necesarios, muestre en pantalla el área de un círculo, un cuadrado y un triángulo.
Utiliza el valor 3.1416 como aproximación de П (pi) o importa el valor del módulo
“math”.'''
def ejercicio2():
    print('\nEjercicio nº 2')
    def circulo(radio):
        return math.pi*radio**2
    def cuadrado(lado):
        return lado**2
    a=float(input("Introduce el radio del círculo:\n\t"))
    print('El área del círculo es: \n\t%.5f\n\n' %circulo(a))
    a=float(input("Introduce el lado del cuadrado:\n\t"))
    print('El área del cuadrado es: \n\t%.2f\n\n' %cuadrado(a))
    c=lambda e,f:e*f/2
    a=float(input("Introduce la base del triángulo:\n\t"))
    b=float(input("Introduce la altura del triángulo:\n\t"))
    print('El área del triángulo es: \n\t%.2f\n\n' %c(a,b))



#Ejercicio_3
'''3. El Barn (también llamado a veces granero) es una unidad de superficie,
equivalente a 10-28 m2. Un Barn es, aproximadamente, el área de la sección
transversal del núcleo de un átomo de uranio, por lo que son muy utilizados en
física de partículas para medir las secciones en reacciones nucleares. Programa dos
funciones, una que permita convertir unidades en m2 a Barns, y su inversa.'''
def ejercicio3():
    print('\nEjercicio nº 3')
    def barn(C):
        return C/(10**(-28))
    def metro(C):
        return C*(10**(-28))
    a=int(input("¿Qué opción quiere realizar:\n\t1.- Tranformar Barns en m2\
    \n\t2.- Transformar m2 en Barns\n"))
    while a<1 or a>2:
        a=int(input("¿Qué opción quiere realizar:\n\t1.- Tranformar Barns en m2\
    \n\t2.- Transformar m2 en Barns\n"))
    if a==1:
        b=float(input("Introduzca la cantidad de Barns:\n\t"))
        print("%.30f m2" %metro(b))
    else:
        b=float(input("Introduzca la cantidad de Barns:\n\t"))
        print("%.2f Barns" %barn(b))



#Ejercicio_4
'''4. Implementa un programa modularizado qu  e, leyendo la nota obtenida por tres
alumnos en una asignatura, muestre por pantalla la media de las notas.'''
def ejercicio4():
    print('\nEjercicio nº 4')
    t_sum=0
    for i in range(3):
        nota=float(input("Introduzca la nota del alumno %i:\n\t" %(i+1)))
        t_sum+=nota
    print('La media es: %.2f' %(t_sum/(i+1)))



#Ejercicio_5
'''5. La Tasa de Interés Efectivo Anual (TIEA) se calcula a partir de una tasa nominal
anual (TNA) y de un determinado número entero de períodos de capitalización (m)
de la tasa nominal anual en el año: TIEA=(1 + TNA/n)n-1, siendo n el número de
periodos total de un año, es decir, 12 si hablamos de períodos mensuales. Escribe
una función que calcule el TIEA a partir del TNA y el número de períodos (4 si es
trimestral, 2 si es semestral, etc.).'''
def ejercicio5():
    print('\nEjercicio nº 5')
    def interes(tipo,per):
        return 100*(((1+tipo/per)**per)-1)
    opcion=[1,2,3,4,6,12]
    TNA=float(input("Introduzca la Tasa de Interés Nominal (TNA):\n\t"))
    a=int(input("Elija el tipo de Capitalización:\n\t1.- Anual (1)\
    \n\t2.- Semestral (2)\n\t3.- Cuatrimestral (3)\n\t4.- Trimestral (4)\n\t\
    5.- Bimestral (6)\n\t6.- Mensual (12)\n"))
    print ('La Tasa de Interés Efectiva Anual es:\n\t%.4f' \
    %(interes(TNA,opcion[a-1])),'%')



#Ejercicio_6
'''6. Define una función que convierta radianes en grados (recuerda que 360 grados
son 2П radianes.)'''
def ejercicio6():
    print('\nEjercicio nº 6')
    def grad(rad):
        return (360*rad)/(2*math.pi)
    a=float(input("Introduzca radianes:\n\t"))
    print("Los grados son:\n\t%.2f" %grad(a))



#Ejercicio_7
'''7. Escribe un programa modularizado que solicite al usuario una hora en formato
[hora, minutos y segundos] y utilizando una función que calcule el número total de
segundos transcurridos desde la última medianoche, lo muestre posteriormente por
pantalla.'''
def ejercicio7():
    print('\nEjercicio nº 7')
    num_seg=0
    a=float(input("Introduce la hora:\n\t"))
    num_seg+=mod_horas(a)
    print(num_seg)
    a=float(input("Introduce los minutos:\n\t"))
    num_seg+=mod_minutos(a)
    print(num_seg)
    a=float(input("Introduce los segundos:\n\t"))
    num_seg+=mod_segundos(a)
    print(num_seg)



#Ejercicio_8
'''8. Escribe un programa que lea una longitud en kilómetros y muestre su
equivalencia en Hm, Dm y m utilizando una función para cada cálculo.'''
def ejercicio8():
    print('\nEjercicio nº 8')
    def hecto(km):
        return 10*km
    def deca(km):
        return 100*km
    def met(km):
        return 1000*km
    a=float(input("Introduczca los km:\n\t"))
    print("Los Hm son:",hecto(a))
    print("Los Hm son:",deca(a))
    print("Los Hm son:",met(a))



#Ejercicio_9
'''9. Escribe una función que determine si un punto de coordenadas en 2D está o no
sobre la circunferencia x2+y2=1000.'''
def ejercicio9():
    print('\nEjercicio nº 9')
    a=float(input("Introduczca la x:\n\t"))
    b=float(input("Introduczca la y:\n\t"))
    circun(a,b)



#Ejercicio_10
'''10. El antiguo sistema anglosajón de unidades sigue en vigor en muchos lugares y
su uso es frecuente en algunos contextos. Programa una función que determine el
número de pintas que contiene una cierta cantidad de líquido expresada en
mililitros, sabiendo que 1 pinta (pt) = 473,176473 ml.'''
def ejercicio10():
    print('\nEjercicio nº 10')
    def pint(ml):
        return ml/473.176473
    a=float(input("Introduczca la cantidad de mililitros:\n\t"))
    print("La cantidad de pintas son: %.2f" %pint(a))



#Ejercicio_11
'''11. Escribe un programa que muestre por pantalla la tabla de multiplicar de un
número dado invocando para ello una función a la que le pasará dicho número.
Utilice el siguiente formato (ejemplo para la tabla del 1):'''
def ejercicio11():
    print('\nEjercicio nº 11')
    for i in range(1,10):
        print("1 *",i,"=",1*i)



#Ejercicio_12
'''12. La temperatura expresada en grados centígrados TC, se puede convertir a
grados Fahrenheit (TF) mediante la siguiente fórmula: TF = 9*TC/5 + 32.
Igualmente, es sabido que −273,15 °C corresponden con el 0 Kelvin. Escribe una
función devuelva la temperatura en grados Farenheit y otra en Kelvin a partir de la
temperatura en grados centígrados. Escribe un programa para probarlas que pida al
usuario una temperatura en grados centígrados.'''
def ejercicio12():
    print('\nEjercicio nº 12')
    def kelvin(cent):
        return cent+273.15
    273.15
    def fahrenheit(cent):
        return 9*cent/5+32
    a=float(input("Introduczca la Temperatura en grados centígrados:\n\t"))
    print("La Temperatura en Kelvin es: ", kelvin(a))
    print("La Temperatura en Kelvin es: ", fahrenheit(a))



#Ejercicio_13
'''13. Escribe una función que a partir de las coordenadas 3D de dos puntos en el
espacio en formato (x, y, z) calcule la distancia que hay entre dichos puntos.
Prueba su función y el resultado por pantalla.'''
def ejercicio13():
    print('\nEjercicio nº 13')
    def distancia(p1,p2):
        t_sum=0
        for i in range(3):
            t_sum+=(p1[i]-p2[i])**2
        return pow(t_sum,0.5) 
    x1=[]
    for i in range(3):
        a=int(input("Introduce el punto: "))
        x1.append(a)
    print (x1)
    x2=[]
    for i in range(3):
        a=int(input("Introduce el punto: "))
        x2.append(a)
    print (x2)
    print("La distancia entre los puntos es: %.2f" %
        distancia(x1,x2))



#Ejercicio_14
'''14. Un número complejo es un número de la forma a+bi, donde a y b son números
reales y el valor de i es √−1 . Las cuatro operaciones aritméticas básicas sobre
números complejos se definen como:
Suma: (a+bi)+(c+di)=(a+c)+(b+d)i
Resta: (a+bi)-(c+di)=(a-c)+(b-d)i
Producto: (a+bi)*(c+di)=(ac-bd)+(ad+bc)i
División: (a+bi)/(c+di) = ((ac+bd)/(c2+d2)) + ((bc-ad)/(c2+d2))i, suponiendo c2+d2<>0
Programa funciones, para cada una de las operaciones descritas, y posteriormente,
realiza un programa probador que lea dos números complejos y muestre por
pantalla el resultado de las operaciones reseñadas.'''
def ejercicio14():
    print('\nEjercicio nº 14')
    complejos=[]
    for i in range(2):
        a=complex(input("Introduzca un número complejo (la parte compleja con j): \n\t"))
        complejos.append(a)
    print(complejos[0].real,complejos[0].imag)
    print(complejos[0]+complejos[1])
    print(complejos[0]-complejos[1])
    print(complejos[0]*complejos[1])
    print(complejos[0]/complejos[1])




#Ejercicio_15
'''15. Un año es bisiesto si es divisible por 400 o si lo es por 4 pero no por 100.
Programa una función que reciba un año y decida si es o no bisiesto.'''
def ejercicio15():
    print('\nEjercicio nº 15')
    a=int(input("Introduce un año: "))
    if (a%400==0 or (a%4==0 and a%100!=0)):
        print("Bisiesto")
    else:
        print("NO Bisiesto")


