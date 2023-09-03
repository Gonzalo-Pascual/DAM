#Examen Gonzalo Pascual Romero
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
	alumnos = {}
	validar = False
	for i in range(3):
		nombre = input("Introduce el nombre del alumno " + str(i+1) + ": ")
		nota = input("Introduce la nota del alumno " + str(i+1) + ": ")  
		while validar == False:
			try:
				nota = float(nota)
				break
			except:
				nota = input("Introduce la nota del alumno(número) " + str(i+1) + ": ")  
		alumnos[nombre] = nota
	print("La nota media es: ", (sum(alumnos.values())))
	print("La nota máxima es: ", max(alumnos.values()))
	print("La nota mínima es: ", min(alumnos.values()))
	

def ejercicio3():
	complejos = [1+3j, 5+8j, 2+4j]
	print("La suma de los complejos es: ", sum(complejos))
	print("La multiplicación de los complejos es: ",complejos[0]*complejos[1]*complejos[2])


def ejercicio4():
	import math
	punto1 = [1,2,3]
	punto2 = [4,5,6]
	print("La distancia entre los dos puntos es: ",round(math.sqrt((punto1[0]-punto2[0])**2 + (punto1[1]-punto2[1])**2 +(punto1[2]-punto2[2])**2),2))
	
def ejercicio5():
	import datetime
	hoy = datetime.date(2023,2,13)
	dia = int(input("Introduce el día de tu nacimiento: "))
	mes = int(input("Introduce el mes de tu nacimiento: "))
	año = int(input("Introduce el año de tu nacimiento: "))
	fnac = datetime.date(año, mes, dia)
	edad = hoy.year - fnac.year - ((hoy.month, hoy.day) < (fnac.month, fnac.day))
	print("Tienes", edad, "años")
		
def ejercicio6():
	lista = [('Juan', 23), ('Pedro', 30), ('Manuel', 43), ('Maria', 18), ('Santiago', 51),]
	lista.sort(key=lambda x: x[0], reverse=True)
	print("Mayor a menor por nombre: ",lista)
	lista.sort(key=lambda x: x[1], reverse=True)
	print("Mayor a menor por edad: ",lista)
	
def ejercicio7():
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
	
def ejercicio8():
	nombre = "Vendedor "
	sueldobase = 1250.25
	for i in range(5):
		ventas = random.randint(1500, 5000)
		comisionventas = float(ventas*0.15)
		transporte = random.randint(100,300)
		salario = float(sueldobase+comisionventas+transporte)
		irpf = salario*0.12
		ss = salario*0.432
		sueldoneto = salario-(ss+irpf)
		print("\nNombre:",nombre + str(i+1))
		print("Sueldo base:", sueldobase)
		print("Ventas:", round(comisionventas, 3))
		print("Plus transporte:", round(transporte,3))
		print("IRPF:", round(irpf,3))
		print("S.S.:", round(ss,3))
		print("Sueldo neto:", round(sueldoneto,3))

	
	
	
def ejercicio9():
	file = open("examen.txt", "w")
	nombre = "Vendedor "
	sueldobase = 1250.25
	for i in range(5):
		ventas = random.randint(1500, 5000)
		comisionventas = float(ventas*0.15)
		transporte = random.randint(100,300)
		salario = float(sueldobase+comisionventas+transporte)
		irpf = salario*0.12
		ss = salario*0.432
		sueldoneto = salario-(ss+irpf)
		file.write(nombre+str(i+1) + "; " + str(sueldobase) + "; " + str(round(comisionventas, 3)) + "; " + str(round(transporte,3)) + "; " + str(round(irpf,3)) + "; " + str(round(ss,3)) + "; " + str(round(sueldoneto,3)))
	print("Introducido en el fichero")

def ejercicio10():
	print("Ventas.txt:")
	with open("ventas.txt", "r") as file:
		contents = file.read()
		print(contents)
	





	
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
