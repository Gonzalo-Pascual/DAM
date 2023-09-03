import random
#Ejercicio 1
'''1. Escribe un código que implemente el siguiente comportamiento: “Si la compra es
superior a 100EUR se aplica un descuento del 5% si se paga al contado, pero si el pago
es con tarjeta sólo se aplica el 2%”. Asegúrate de que el importe de la compra es un
número válido antes de proceder a los cálculos (pista: usa try para comprobar que es
posible convertir la entrada a un float).'''
def ejercicio1():
    try:
        precio = float(input("Introduzca el precio de compra: "))
        compra = (input("Tipo de pago:(Contado/Tarjeta):")).upper()
        if precio > 100:
            if compra == ("Contado").upper():
                total = precio * 0.05
            else:
                total = precio * 0.02
        else:
            total = precio
        print("El descuento es de", round(total, 2), "€ y el precio a pagar es", round(precio-total, 2) ,"€")
    except KeyError:
        print("El precio no es correcto")


#Ejercicio 2
'''2. Una universidad acaba de modificar su sistema de representación de la calificación
de los alumnos, que como es sabido son valores entre 0 y 10. A partir de ahora, se
calificarán como “A” las notas mayores o iguales a 8,5, “B” las mayores o iguales a 6,5,
“C” las calificaciones mayores o iguales a 5, “D” las calificaciones mayores o iguales a
3,5, y “F” todas las demás. Programa una función que reciba una calificación numérica
y retorne la letra con la nueva calificación. Asegúrate de que la calificación introducida
es válida (idea: programa una función lo suficientemente genérica que se pueda luego
reutilizar en programas que necesiten una validación similar).'''
def ejercicio2():

    def notas(nota):
        if nota >=8.5 and nota <=10:
            return ("A")
        elif nota >=6.5 and nota <8.5:
            return("B")
        elif nota >=5 and nota <6.5:
            return("C")
        elif nota >=3.5 and nota <5:
            return("D")
        elif nota <3.5 and nota >=0:
            return("F")
        else:
            return("No es una nota válida")
    try:
        nota = float(input("Introduzca la nota del alumno:"))
        print("La nota del alumno es:",notas(nota))
    except(KeyError):
        print("Error")


#Ejercicio 3
'''3. Escribe un algoritmo que tras leer tres enteros los escriba en pantalla en orden
creciente. Como siempre, valida las entradas.'''
def ejercicio3():
    try:
        lista = []
        for i in range(3):
            numero = float(input("Introduzca el número:"))
            lista.append(numero)
            lista.sort(reverse= False)
        print(lista)
    except(KeyError):
        print("Error")
    
#Ejercicio 4
'''4. Codifica un subprograma que reciba un número entero, y si es entre 1 y 12 escriba
un mensaje por pantalla indicando el mes a que dicho número corresponde. En caso
contrario deberá mostrar un mensaje de error.'''
def ejercicio4():
    meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
    try:
        num = int(input("Escriba el mes en número:"))
        if num >=1 and num <=10:
            print("El mes es:", meses[num-1])
        else:
            print("El mes no es válido")

    except(KeyError):
        print("El mes no es válido")


#Ejercicio 5
'''5. Escribe un programa que, después de preguntar cuántos números se van a
introducir, pida esos números (enteros o reales) y devuelva su media aritmética, el
mayor y el menor. El programa debe controlar que la cantidad de números es mayor de
2 y en caso contrario ha de mostrar un mensaje de error.'''
def ejercicio5():
    try:
        lista=[]
        total=0
        num = int(input("Cantidad de números: "))
        if num > 2:
            for i in range(num):
                valor = float(input("Añada los números: "))
                lista.append(valor)
                total += valor
            print("El máximo es:", max(lista))
            print("El mínimo es:", min(lista))
            print("La media es:", total/num)

        else:
            print("Error, tiene que tener más de 2 números")
    except(KeyError):
        print("Error")


#Ejercicio 6 y 7
'''6. Escribir una función que sume dos listas de igual longitud y retorne otra lista que
contenga la suma de las originales elemento a elemento.

7. Modifique el ejercicio anterior permitiendo que las listas sean desiguales. Los
elementos sobrantes de la lista más larga se añadirán al final de la lista resultante.'''
def ejercicio6():
    lista=[1,2,3,4,5]
    lista2=[4,5,6,7,8]
    lista3 = []
    for i in range(min(len(lista), len(lista2))):
        lista3.append(lista[i]+lista2[i])    
    if len(lista)>len(lista2):
        for i in range(len(lista2),len(lista)):
            lista3.append(lista[i])
    elif len(lista)<len(lista2):
        for i in range(len(lista),len(lista2)):
            lista3.append(lista2[i])
        
    print(lista3)
ejercicio6()


#Ejercicio 8
'''8. Distribuir los 20 datos enteros en dos listas de tal manera que se vayan generando
dos secuencias ordenadas, una creciente y otra decreciente.'''
def ejercicio8():
    #no se puede poner igual en el sort()
    lista = [4, 2, 1, 3]
    lista2 = lista
    lista3 = lista
    print(lista)
    print(sorted(lista))
    lista2.sort()
    print(lista2)
    lista3.sort(reverse=True)
    print(lista3)

def ejercicio82():
    lista = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
    lista1 = []
    lista2 = []
    for i in range(0, len(lista)):
        if lista[i] % 2 == 0:
            lista1.append(lista[i])
        else:
            lista2.append(lista[i])
    print("Lista 1: ", lista1)
    print("Lista 2: ", lista2)
    lista1.sort()
    lista2.sort(reverse=True)
    print("Lista 1 ordenada: ", lista1)
    print("Lista 2 ordenada: ", lista2)
    return lista1, lista2


#Ejercicio 9
'''9. Crear una lista de enteros, inicializarlos según valores aleatorios en el rango 1.20 y
computar la media de los valores, el valor más alto y el más bajo (todo ello utilizando
listas).'''
def ejercicio9():
    lista = []
    for i in range(0, 20):
        lista.append(random.randint(1, 20))
    print("Lista: ", lista)
    print("Valor más alto: ", max(lista))
    print("Valor más bajo: ", min(lista))
    print("Media: ", sum(lista) / len(lista))
    return max(lista), min(lista), sum(lista) / len(lista)

#Ejercicio 10
'''10. Implementar una función que compruebe si una palabra es un palíndromo.'''
def ejercicio10():
    palabra = input("palabra: ")
    if palabra == palabra[::-1]:
        print("Es palíndromo")
    else:
        print("No es palíndromo")
    return palabra


#Ejercicio 11
'''11. Implementar una función que pone en mayúsculas todas las primeras letras de las
palabras de una frase.'''
def ejercicio11():
    frase = input("frase: ")
    # frase = frase.title()
    # alternativa
    
    texto = frase.split()
    for i in range(0, len(frase)):
        frase[i] = frase[i].capitalize()
    frase = " ".join(frase)
    return texto


#Ejercicio 12
'''12. Crear una función que compruebe si dos cadenas de caracteres son iguales.'''
def ejercicio12():
    cadena1 = input("Cadena 1: ")
    cadena2 = input("Cadena 2: ")
    if cadena1 == cadena2:
        print("Son iguales")
    else:
        print("No son iguales")
    return cadena1, cadena2


#Ejercicio 13
'''13. Implemente una función que indique si una palabra contiene las cinco vocales: por
ejemplo “murciélago”.'''
def ejercicio13():
    palabra = input("palabra: ")
    if "a" in palabra and "e" in palabra and "i" in palabra and "o" in palabra and "u" in palabra:
        print("Contiene las cinco vocales")
    else:
        print("No contiene las cinco vocales")
    return palabra


#Ejercicio 14
'''14. Escriba un programa que “codifique” una frase modificando todas las vocales según
el siguiente código: a por 4, e por 3, i por 1, o por 0 y u por el símbolo #. Por ejemplo,
la frase: “Un perro del hortelano”, deberá devolverse: “#n p3rr0 d3l h0rt3l4n0”.'''
def ejercicio14():
    frase = input("frase: ")
    frase = frase.replace("a", "4")
    frase = frase.replace("e", "3")
    frase = frase.replace("i", "1")
    frase = frase.replace("o", "0")
    frase = frase.replace("u", "#")
    # frase = "hola mundo que tal estamos todos aqui"
    # frase2 = ""
    # for i in range(len(frase)):
    #     match frase[i]:
    #         case 'a':
    #             frase2 += "4"
    #         case 'e':
    #             frase2 += '3'
    #         case 'i':
    #             frase2 += '1'
    #         case 'o':
    #             frase2 += '0'
    #         case 'u':
    #             frase2 += '#'
    #         case other:
    #             frase2 += str(frase[i])
    return frase


#Ejercicio 15
'''15. Realizar un programa que lea palabras hasta que se introduzca “fin”, mostrando
una estadística de las longitudes de las palabras, es decir, el número total de palabras
de longitud 1 que se hayan introducido, el total de longitud 2, etc. La máxima longitud
de las palabras deberá ser de 25 caracteres. Una posible salida de este programa sería:
Palabras longitud 1: 0
Palabras longitud 2: 10
...
Palabras longitud 25: 1'''
def ejercicio15():
    x = input("palabra fin terminar: ")
    lista = []
    for i in range(25):
        lista.append(0)
    while(x.lower() != 'fin'):
        lista[len(x)-1] += 1
        x = input("palabra fin terminar: ")
        
    for i in range(len(lista)):
        print("Palabras longitud", (i+1), ":", lista[i])
    
#Ejercicio 16
'''16. Implementa las estructuras de datos que permitan almacenar información anónima
sobre personas con objeto de hacer un estudio estadístico. Así, se deberá almacenar el
número de secuencia, sexo y edad de cada persona. Programe además un par de
funciones para
a. leer por teclado datos relativos a una persona
b. para mostrar dichos datos por pantalla.'''
class Persona:
    id = 0
    edad = 0
    sexo = ""
    
    # Constructor
    def __init__(self, id, edad, sexo):
        self.id = id
        self.edad = edad
        self.sexo = sexo
    # # toString
    def __str__(self):
        return "id: " + self.id + ", edad: " + self.edad + ", sexo: " + self.sexo
    # # Eliminar objeto
    # def __del__(self):
    #     print("Se ha eliminado el objeto " + self.nombre)
    # Métodos
    def hablar(self, mensaje):
        print(self.nombre + " dice: " + mensaje)
    
    def leer(self):
        id = input("Indicar id: ")
        self.id = id
        edad = input("Indicar la edad: ")
        self.edad = edad
        sexo = input("Indicar el sexo: ")
        self.sexo = sexo

# persona = Persona(1, 12, "hombre")
# persona.leer()
# print(persona)


#Ejercicio 17
'''17. Haciendo uso de la estructura Fecha de los ejercicios resueltos, implementa una
estructura Cronologia que permita llevar la cuenta de 3 fechas importantes en la vida
de toda persona: día de su nacimiento, fecha en que celebró su matrimonio y fecha de
deceso.'''
from  datetime import date
class Fechas:
    fnacimiento = ""
    fmatrimonio = ""
    fdeceso = ""
    def __init__(self):
        self
    def setFnacimiento(self):
        fnacimiento = input("Indicar fecha nacimiento yyyy-mm-dd: ")
        fnacimiento = date(int(fnacimiento.split("-")[0]), int(fnacimiento.split("-")[1]), int(fnacimiento.split("-")[2]))
        self.fnacimiento = fnacimiento
    def setFmatrimonio(self):
        fmatrimonio = input("Indicar fecha matrimonio yyyy-mm-dd: ")
        fmatrimonio = date(int(fmatrimonio.split("-")[0]), int(fmatrimonio.split("-")[1]), int(fmatrimonio.split("-")[2]))
        self.fmatrimonio = fmatrimonio
    def setFdeceso(self):
        fdeceso = input("Indicar fecha deceso yyyy-mm-dd: ")
        fdeceso = date(int(fdeceso.split("-")[0]), int(fdeceso.split("-")[1]), int(fdeceso.split("-")[2]))
        self.fdeceso = fdeceso
    def __str__(self):
        return "Fecha nacimiento " + str(self.fnacimiento) + " Fecha matrimonio " + str(self.fmatrimonio) + " Fecha deceso " + str(self.fdeceso)
    
'''18. Reutilizando lo programado en el ejercicio 17, implementa funciones para leer las
fechas importantes de una persona y comprobar si son o no correctas (el orden ha de
ser nacimiento, matrimonio, deceso, obligatoriamente). Si no lo fueran debería
indicarse y solicitarse de nuevo.'''
# fecha = Fechas()
# fecha.setFnacimiento()
# fecha.setFmatrimonio()
# while(fecha.fmatrimonio < fecha.fnacimiento):
#     fecha.setFmatrimonio()
# fecha.setFdeceso()
# while(fecha.fdeceso < fecha.fmatrimonio):
#     fecha.setFdeceso()
# print(fecha)

#Ejercicio 19
'''19. Implemente una aplicación que solicite 10 valores y los almacene en un array. A
continuación, recorra el array restándole a cada valor el valor que se encuentre en la
siguiente posición (ej.: [1 3 5], resultado [(1-3) (3-5) (5-1)] = -2 -2 4). Modularice su
solución.'''
def ejercicio19():
    lista = [1,3,5]
    primero = lista[0]
    for i in range(len(lista)-1):
        lista[i] -= lista[i+1]
    lista[len(lista)-1] -= primero
    print(lista)


#Ejercicio 20
'''20. Implemente una aplicación para ayudar en la gestión de cobros de una gasolinera.
Mediante 3 arrays deberá calcular el gasto de un total de 10 clientes. El primer array
será utilizado para almacenar el gasto de cada cliente en gasolina, el segundo array
será utilizado para almacenar el gasto en productos de la tienda de la gasolinera, el
tercer array almacenará la suma de los dos arrays anteriores. La aplicación:
a. Solicitará por teclado los gastos de gasolina y de la tienda para cada uno
de los 10 clientes.
b. Mostrará por pantalla la suma de los gastos para cada cliente.'''
def ejercicio20():
    gasolina = [0,0,0,0,0,0,0,0,0,0]
    tienda = [0,0,0,0,0,0,0,0,0,0]
    total = [0,0,0,0,0,0,0,0,0,0]
    for i in range(len(gasolina)):
        gasolina[i] = int(input("Gasto gasolina: "))
        tienda[i] = int(input("Gasto tienda: "))
        total[i] = gasolina[i] + tienda[i]
        print("Total cliente " + str(i+1) + " es: " + str(total[i]))


#Ejercicio 21
'''21. Crear un diccionario “agenda telefónica” donde la clave sea el nombre de una
persona y el valor sea el teléfono. Programar una función para llenarlo y otra para
mostrarlo. Para llenarlo, es necesario ir pidiendo contactos hasta el usuario diga que no
quiere insertar más. Obviamente, no es válido introducir nombres repetidos.'''
def ejercicio21():
    agenda = {'antonio': '98765654', 'pepe': '09845678', 'kike': '4567896543'}
    # a = input("Nombre: ")
    # while( a != '0'):
    #     b = input("Telefono: ")
    #     agenda[a] = b
    #     a = input("Nombre: ")
    print(agenda)
    for (k,v) in agenda.items():
        print(k, v)
    
    lista = list(agenda.items())
    print(lista)


#Ejericio 22
'''22. Programar una función que reciba un diccionario y una lista y que como salida
genere dos listas:

a. una lista con todos los valores de aquellos elementos de la lista que están
en el diccionario,
b. otra lista con los valores de los elementos que NO están en el diccionario.'''
def ejercicio22():
    agenda = {'antonio': '98765654', 'pepe': '09845678', 'kike': '4567896543'}
    lista = ['antonio','luis','pedro']
    
    listaendiccionario = []
    listafuera = []
    
    for i in lista:
        if(agenda.get(i,0) != 0):
            listaendiccionario.append(i)
        else:
            listafuera.append(i)
            
    print(listaendiccionario)
    print(listafuera)
