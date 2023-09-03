import os
import random

def menu():
	os.system('cls')
	print("Selecciona una opción")
	print("\t1 - Operadores")
	print("\t2 - Variables")
	print("\t3 - Entrada y salida")
	print("\t4 - Estructura de control")
	print("\t5 - Cadenas")
	print("\t6 - Listas")
	print("\t7 - Tuplas")
	print("\t8 - Conjuntos")
	print("\t9 - Funciones")
	print("\t10 - Funciones lambda")
	print("\t11 - Clases")
	print("\t12 - ficheros")
	print("\t13 - Lista de la compra")
	print("\t14 - Vocales")
	print("\t15 - Validar DNI")
	print("\t0 - Salir")


# Operadores
def operadores():
	a = 5
	b = 3
# Ejercicio 1 Comprobar si a y b son iguales
	print("¿Son iguales?",a == b)
# Ejercicio 2 Calcular la potencia de a^b
	print("Potencia: ",a ** b)
# Ejercicio 3 dividir a por b de forma entera
	print("División entera: ",a // b)


# Variables
def variables():
# Ejercicio 1 Imprime un mensaje con variables
	edad = 30
	mensaje = "Tengo " + str(edad) + " años."
	print("Mensaje: ",mensaje)
# Ejercicio 2 Cambia las variables de valor
	x = 5
	y = 10
	x, y = y, x
	print("Cambio de variables: ",y, x)
# Ejercicio 3 Imprime el tipo de cada variable
	nombre = "Juan"
	edad = 31
	print("Tipos: ",type(nombre), type(edad))


# Entrada y salida
def entrada():
# Ejercicio 1 Introduce tu nombre por teclado
	nombre = input("Ingrese su nombre: ")
# Ejercicio 2 Introduce tu apellido por teclado e imprime el nombre y apellido
	apellido = input("Ingresa su apellido: ")
	print("Bienvendio ", nombre, apellido)

# Ejercicio 3 ingresa un número en de tipo int
	num = int(input("Ingresa un número: "))
	print("El número es ", num)


# Estructuras
def estructuras():
# Ejercicio 1 comprueba si el número es positivo o negativo
	x = int(input('Introduce un número: '))
	if x > 0:
		print(x, "es positivo")
	else:
		print(x, "es negativo")
# Ejercicio 2 Imprime los números positivos del 0 al 10
	print("Números pares del 0 al 10")
	for i in range(0, 11, 2):
		print(i)
# Ejercicio Adivina el número entre el 0 y el 10
	adv = random.randint(0,10)	
	num = int(input("Adivina el número: "))
	while adv != num:
		num = int(input("Adivina el número: "))
	print("Número acertado")

 

# Cadenas
def cadenas():
# Ejercicio 1 contar la longutud de una cadena
	cadena = "Hola mundo"
	print(len(cadena))
# Ejercicio 21 poner en capitales la cadena
	print(cadena.upper())
# Ejercicio 3 concatenar cadenas
	saludo = "Hola"
	nombre = "Juan"
	mensaje = saludo + ", " + nombre
	print(mensaje)


# Listas
def listas():
# Ejercicio 1 crea e imprime una lista
	nombres = ["Antonio", "Pedro", "Manuel"]
	print("Lista nombres: ",nombres[1])
# Ejercicio 2 Añade un nuevo registro a la lista
	nombres.append("Sara")
	print("Añadir: ",nombres)
# Ejercicio 3 elimina un registro de la lista
	nombres.remove("Antonio")
	print("Eliminar: ",nombres)


# Tuplas
def tuplas():
# Ejercicio 1 Crea una tupla e imprime el primer elemento
	datos = ("Juan", 32, "Masculino")
	print(datos[0])
# Ejercicio 2 Imprime cantidad de elementos que hay en la tupla
	print("Elementos en la tupla",len(datos))
# Ejercicio 3  ordena una lista en forma ascendente y descendente
	datos2 = (3, 9, 1, 4 ,6, 5 ,7)
	print("Ordenada ascendente: ",sorted(datos2))
	print("Ordenada descendente: ",sorted(datos2, reverse=True))
	


# Conjuntos
def conjuntos():
# Ejercicio 1 Crea un conjunto y visualizalo
	numeros = set([1, 2, 3, 4, 5, 1, 2, 3])
	print("Conjunto",numeros)
# Ejercicio 2 Añade un elemento al conjunto
	numeros.add(6)
	print("Añadir",numeros)
# Ejercicio 3 elimina un elemento del conjunto
	numeros.remove(5)
	print("Eliminar", numeros)


# Funciones
def funciones():
	# Ejercicio 1 Haz una función que devuelva una suma
	def sumar(a, b):
		return a + b
	print("La suma es:", sumar(3, 6))
	# Ejercicio 2 Indica cual es el número mayor 
	def mayor(a, b):
		if a > b:
			return a
		else:
			return b
	print("El número mayor es: ",mayor(2, 3))
	# Ejercicio 3 Haz una lista de números y sumalos todos
	def suma_lista(numeros):
		suma = 0
		for numero in numeros:
			suma += numero
		return suma
	print("La suma de la lista es: ",suma_lista([1, 2, 3, 4, 5]))


# Funciones Lambda
def funlambda():
	# Ejercicio 1 Haz una función lambda de sumar 
	sumar = lambda a, b: a + b
	print("La suma es: ",sumar(2, 3))
	# Ejercicio 2 Haz una función lambda para saber cual es el mayor de dos números
	mayor = lambda a, b: a if a > b else b
	print("El mayor es: ",mayor(2, 3))
	# Ejercicio 3 Haz una función lambda para mostrar solo los pares de una lista
	pares = lambda numeros: [n for n in numeros if n % 2 == 0]
	print(pares([1, 2, 3, 4, 5]))


# Clases y objetos
def clases():
	
	# Ejercicio 1 Crea una clase persona e introduce y visualiza un objeto persona 
	class Persona():
		def __init__(self, nombre, edad):
			self.nombre = nombre
			self.edad = edad
	Persona1 = Persona('Manuel', 31)
	print('Mi nombre es', Persona1.nombre, 'y tengo', Persona1.edad, "años")
	# Ejercicio 2 Crea una clase area e introduce y calcula el area de un triangulo 
	class Area(): 
			def __init__(self, ancho, alto):
				self.ancho = ancho
				self.alto = alto

			def area(self):
				return (self.ancho * self.alto)/2
	triangulo = Area(10, 20)
	print('El area del triangulo es:', triangulo.area())
	# Ejercicio 3 Crea una clase sueldo con un objeto empleado al que le podamos subir el sueldo
	class Sueldo:
		def __init__(self, nombre, salario):
			self.nombre = nombre
			self.salario = salario
	emp1 = Sueldo('Jose', 2000)
	print('Empleado: ', emp1.nombre, emp1.salario)
	subida = int(input("¿Cuanto quiere subirle el sueldo al empleado?"))
	emp1 = Sueldo('Jose', 2000+subida)
	print('Empleado: ', emp1.nombre, emp1.salario)


# Ficheros(Escribir y leer en un fichero)
def ficheros():
# Ejercicio 1 Escribir en un fichero
	with open("example2.txt", "w") as file:
		file.write("Linea 1\n")
		file.write("Linea 2\n")
		file.write("Linea 3\n")
#Ejercicio 2 Leer en un fichero
	with open("example2.txt", "r") as file:
		contents = file.read()
		print(contents)
#Ejercicio 3 Visualiza la ruta del archivo
	import os
	with open("example.txt", "r") as file:
		print(os.getcwd())


'''========= MAS EJERCICIOS ========='''	
'''Ejercicio 14 - Haz un programa  que permita introducir por teclado
producto y su precio hasta que el cliente decida terminar de introducir productos
despues que haga una lista de la compra con todos los elementos, sus respectivos 
precios y el total a pagar'''
def listacompra(continuar = True, validar = False, compra = {} ):
	while continuar == True:
		producto = input('Introduce un producto: ')
		precio = input('Introduce el precio de ' + producto + ': ')
		while validar == False:
			try:
				precio = float(precio)
				break
			except:
				precio = input('Introduce el precio de ' + producto + ':(Número)')
		compra[producto]=precio
		continuar = input('¿Quieres añadir más productos a la compra (Si/No)? ').upper() == "SI"
	total = 0
	print('\n========== Factura ==========')
	for producto, precio in compra.items():
		print('>', producto,'\t\t--', precio, '€')
		total +=precio
	print('-----------------------------')
	print('>Total\t\t--', total, '€')
	print('=============================')

'''Ejercicio 15 - Realiza un programa en el que se escriba un texto y que
devuelva la cantidad de cada vocal y el número de palabras que hay'''
def vocales(contesp = 1):
	vocales = ['a', 'e', 'i', 'o', 'u']
	texto = input('Introduce un texto: ')
	for vocal in vocales: 
		cont = 0
		for letra in texto: 
			if letra == vocal:
				cont += 1
		print('La vocal', vocal, 'aparece', str(cont), 'veces')
	print('El texto tiene', texto.count(" ") +1 , 'palabras')

'''Ejercicio 16 - Realiza un programa en el que se escriba por teclado un DNI
y compruebe si es correcto o no'''
def validardin():
	diccionario = {0:"T",1:"R",2:"W",3:"A",4:"G",5:"M",6:"Y",7:"F",8:"P",9:"D",10:"X",
	11:"B",12:"N",13:"J",14:"Z",15:"S",16:"Q",17:"V",18:"H",19:"L",20:"C",21:"K",22:"E"}

	dni = input('\nIntroduzca su DNI: ')
	if len(dni) == 9:
		try:
			num = int(dni[0:8])
			letra = str(dni[8:9])
			validar = num%23
			if(letra == diccionario[validar]):
				print("El DNI es válido")
			else:
				print("El DNI no es válido")

		except:
			print('El DNI no es válido')
	else:
		print('El DNI no es válido')

 

while True:
	# Mostramos el menu
	menu()
	opcionMenu = input("Elija una opción >> ")
	if opcionMenu=="1":
		print ("\n======== Operadores ========")
		operadores()
		input("\npulsa enter para continuar")
	elif opcionMenu=="2":
		print ("\n======== Variables y tipos de datos ========")
		variables()
		input("\npulsa enter para continuar")
	elif opcionMenu=="3":
		print ("\n======== Entrada y salida ========")
		entrada()
		input("\npulsa enter para continuar")
	elif opcionMenu=="4":
		print ("\n======== Estructuras de control ========")
		estructuras()
		input("\npulsa enter para continuar")
	elif opcionMenu=="5":
		print ("\n======== Cadenas ========")
		cadenas()
		input("\npulsa enter para continuar")
	elif opcionMenu=="6":
		print ("\n======== Listas ========")
		listas()
		input("\npulsa enter para continuar")
	elif opcionMenu=="7":
		print ("\n======== Tuplas ========")
		tuplas()
		input("\npulsa enter para continuar")
	elif opcionMenu=="8":
		print ("\n======== Conjuntos ========")
		conjuntos()
		input("\npulsa enter para continuar")
	elif opcionMenu=="9":
		print ("\n======== Funciones ========")
		funciones()
		input("\npulsa enter para continuar")
	elif opcionMenu=="10":
		print ("\n======== Funciones Lambda ========")
		funlambda()
		input("\npulsa enter para continuar")
	elif opcionMenu=="11":
		print ("\n======== Clases y objetos ========")
		clases()
		input("\npulsa enter para continuar")
	elif opcionMenu=="12":
		print ("\n======== Ficheros ========")
		ficheros()
		input("\npulsa enter para continuar")
	elif opcionMenu=="13":
		print ("\n========== Compra ==========")
		listacompra()
		input("\npulsa enter para continuar")
	elif opcionMenu=="14":
		print ("\n======== Vocales ========")
		vocales()
		input("\npulsa enter para continuar")
	elif opcionMenu=="15":
		print ("\n======== Validar DNI ========")
		validardin()
		input("\npulsa enter para continuar")
	elif opcionMenu=="0":
		break
	else:
		print ("")
		input("\npulsa enter para continuar")



