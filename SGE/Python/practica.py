import os
import random

def menu():
	os.system('cls')
	print("Selecciona una opción")
	print("\t1 - Ejercicio 1")
	print("\t2 - Ejercicio 2")
	print("\t3 - Ejercicio 3")
	print("\t4 - Ejercicio 4")
	print("\t5 - Ejercicio 5")
	print("\t6 - Ejercicio 6")
	print("\t7 - Ejercicio 7")
	print("\t8 - Ejercicio 8")
	print("\t9 - Ejercicio 9")
	print("\t10 - Ejercicio 10")
	print("\t0 - Salir")


def ejercicio2():
	lista = [('Juan', 23), ('Pedro', 30), ('Manuel', 43), ('Maria', 18), ('Santiago', 51),]
	lista.sort(key=lambda x: x[0], reverse=True)
	print("Mayor a menor por nombre: ",lista)
	lista.sort(key=lambda x: x[1], reverse=True)
	print("Mayor a menor por edad: ",lista)
	

def ejercicio3():
	alumnos={}
	for i in range(3):
		nombre = input("Introduce el nombre:")
		nota = float(input("Introduce la nota de alumno:"))
		alumnos[nombre] = nota

	print("La nota máxima es: ", max(alumnos.values()))
	print("La nota mínima es: ", min(alumnos.values()))
	print("La nota media es: ", (sum(alumnos.values())/3))
	

def ejercicio4():
	import math
	punto1 = [1,2,3]
	punto2 = [4,5,6]
	print("La distancia es: ", math.sqrt((punto1[0]-punto2[0])**2 + (punto1[1]-punto2[1])**2 +(punto1[2]-punto2[2])**2))


def ejercicio5():
	import datetime
	hoy = datetime.date.today()
	dia = int(input("Introduce el día de tu nacimiento: "))
	mes = int(input("Introduce el mes de tu nacimiento: "))
	año = int(input("Introduce el año de tu nacimiento: "))
	fnac = datetime.date(año, mes, dia)
	edad = hoy.year - fnac.year - ((hoy.month, hoy.day) < (fnac.month, fnac.day))
	print(edad)


def ejercicio6():
	complejos=[3+4j, 5+2j, 4+1j]
	print("La suma de los complejos es: ",sum(complejos))
	print("La multiplicación de los complejos es: ",complejos[0]*complejos[1]*complejos[2])


def ejercicio7():
	class Vendedor:
		def __init__(self, nombre):
			self.nombre = nombre
			self.sueldo_base = 1250.25
			self.irpf = 0.12
			self.seguridad_social = 0.0432

		def sueldoneto(self, ventas, transporte):
			comision = ventas * 0.15
			irpf = (self.sueldo_base + comision + transporte) * self.irpf
			seguridad_social = (self.sueldo_base + comision + transporte) * self.seguridad_social
			sueldo_neto = self.sueldo_base + comision + transporte - irpf - seguridad_social
			return sueldo_neto

		def mostrar(self):
			ventas = random.randint(1500, 5000)
			transporte = random.randint(100, 300)
			sueldo_neto = self.sueldoneto(ventas, transporte)
			informacion = f"Nombre: {self.nombre}\n"
			informacion += f"Sueldo base: {self.sueldo_base:.2f}€\n"
			informacion += f"Ventas: {ventas:.2f}€\n"
			informacion += f"Plus transporte: {transporte:.2f}€\n"
			informacion += f"IRPF: {sueldo_neto * self.irpf:.2f}€\n"
			informacion += f"Seguridad Social: {sueldo_neto * self.seguridad_social:.2f}€\n"
			informacion += f"Sueldo neto: {sueldo_neto:.2f}€\n"
			return informacion

	# Crear una lista de vendedores y generar información para cada uno
	vendedores = [Vendedor(f"Vendedor {i+1}") for i in range(5)]
	for vendedor in vendedores:
		informacion = vendedor.mostrar()
		print(informacion)
		
		with open("ventas.txt", "w") as file:
			file.write(informacion)
		print("Introducidos correctamente")


def ejercicio8():
	with open("ventas.txt", "w") as file:
		file.write()
	print("Introducidos correctamente")


def ejercicio9():
	with open("ventas.txt", "r") as file:
		contents = file.read()
		print(contents)


def ejercicio10():
	vocales = ['a', 'e', 'i', 'o', 'u']
	texto = input('Introduce un texto: ')
	print("Número de caracteres: ",len(texto))
	frase = texto.title()
	print("Primera letra en mayúscula: ",frase)

	for vocal in vocales: 
		cont = 0
		for letra in texto: 
			if letra == vocal:
				cont += 1
		print('La vocal', vocal, 'aparece', str(cont), 'veces')
	if texto == texto[::-1]:
		print("Es palíndromo")
	else:
		print("No es palíndromo")


while True:
	# Mostramos el menu
	menu()
	opcionMenu = input("Elija una opción >> ")
	if opcionMenu=="1":
		print ("\n======== Ejercicio 1 ========")
		print("Menú hecho")
		input("\npulsa enter para continuar")
	elif opcionMenu=="2":
		print ("\n======== Ejercicio 2 ========")
		ejercicio2()
		input("\npulsa enter para continuar")
	elif opcionMenu=="3":
		print ("\n======== Ejercicio 3 ========")
		ejercicio3()
		input("\npulsa enter para continuar")
	elif opcionMenu=="4":
		print ("\n======== Ejercicio 4 ========")
		ejercicio4()
		input("\npulsa enter para continuar")
	elif opcionMenu=="5":
		print ("\n======== Ejercicio 5 ========")
		ejercicio5()
		input("\npulsa enter para continuar")
	elif opcionMenu=="6":
		print ("\n======== Ejercicio 6 ========")
		ejercicio6()
		input("\npulsa enter para continuar")
	elif opcionMenu=="7":
		print ("\n======== Ejercicio 7 ========")
		ejercicio7()
		input("\npulsa enter para continuar")
	elif opcionMenu=="8":
		print ("\n======== Ejercicio 8 ========")
		ejercicio8()
		input("\npulsa enter para continuar")
	elif opcionMenu=="9":
		print ("\n======== Ejercicio 9 ========")
		ejercicio9()
		input("\npulsa enter para continuar")
	elif opcionMenu=="10":
		print ("\n======== Ejercicio 10 ========")
		ejercicio10()
		input("\npulsa enter para continuar")
	elif opcionMenu=="0":
		break
	else:
		print ("")
		input("\npulsa enter para continuar")



