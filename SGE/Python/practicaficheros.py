#Examen Gonzalo Pascual Romero
import os
import random
from datetime import datetime, timedelta

departamentos = ["ADMIN", "FINANZAS", "PERSONAL"]
fecha=datetime.strptime("23-12-1980", "%d-%m-%Y") #El strPtime sirve para convertirn una cadena de fecha y hora en un objeto datetime 
fec = fecha                                       #Al contrario el strFtime sirve para pasar de fecha y horaa cadena
codigo = 1
empleados = 11


file = open("ventas.txt", "w")
while codigo < empleados:
    cod = "COD_" +str(codigo).zfill(3)
    sueldo = random.randint(1000, 9000)
    departamento = random.choice(departamentos) #choice elegin entre una de las opciones 
    alea = random.randint(0,4000)
    fec = fecha+timedelta(days=alea)
    file.write(cod + "; " + str(fec.strftime("%d-%m-%Y"))+ "; " +str(sueldo) +"€; "+ departamento + "\n")
    codigo +=1
file.close()


def leer_fichero():
    f=[]
    for linea in open("ventas.txt","r"):
        f.append(linea.rstrip('\n'))
    return f




def menu():
	os.system('cls')
	print("Selecciona una opción")
	print("\t1 - Visualizar")
	print("\t2 - Sueldo medio, máximo y mínimo")
	print("\t3 - Sueldo medio por departamento")
	print("\t4 - Filtrar por fecha")
	print("\t5 - Sueldos mayores a uno introducido")
	print("\t6 - Buscar por departamento")
	print("\t7 - Ordenación por campo")
	print("\t8 - Mayor, menor y media edad")
	print("\t9 - Añadir al fichero")
	print("\t10 - Eliminar del fichero")
	print("\t11 - Buscar por número de código")
	
	print("\t0 - Salir")
	
def ejercicio1():
	with open("ventas.txt", "r") as file:
		contents = file.read()
		print(contents)

def ejercicio2(): 
    file = leer_fichero()
    registros={}
    for f in range(len(file)):
        registros[file[f][0:7]] = int(file[f][20:25])
	
    media = sum(registros.values())/(empleados-1)
    print("El salario medio es de: ", round(media,2))
	
    maximo = max(registros.values())
    for key,value in registros.items():
                if value==maximo:
                    print("\nEl salario del trabajador",key,"es el mas alto con", value)
	
    minimo = min(registros.values())
    for key,value in registros.items():
	    if value == minimo:
		    print("\nEl salario del trabajador", key, "es el mas bajo con", value)


def ejercicio3():
    fichero = leer_fichero()
    registros=[]
    for f in range(len(fichero)):
        registros.append([fichero[f][28:42],fichero[f][21:25]])

    medias=[]
    for i in departamentos:
        c_num=0
        t_num=0
        m_num=0
        for j in registros:
            if j[0]==i:
                c_num+=1
                t_num+=int(j[1])
                m_num=t_num/c_num
        medias.append([i,round(m_num,2)]) 
    for i in medias:
        print('Departamento:',i[0],'\tMedia:',i[1])
			    


def ejercicio4():
	fichero = leer_fichero()
	anio = int(input("Introduce el año de nacimiento:"))
	fecha =[]
	for f in range(len(fichero)):
		if anio == int(fichero[f][15:19]):
			fecha.append(fichero[f])
	print("\nPersonas nacidas en el año " + str(anio))
	for j in fecha:
		print(j)	

def ejercicio5():
	fichero = leer_fichero()
	minimo = int(input("Introduce el sueldo mínimo:"))
	sueldo =[]
	for f in range(len(fichero)):
		if minimo <= int(fichero[f][21:25]):
			sueldo.append(fichero[f])
	print("\nPersonas con sueldo mayor a " + str(minimo))
	for j in sueldo:
		print(j)	
		    
    

def ejercicio6():
	fichero = leer_fichero()
	dep = input("Elija el departamento(admin, finanzas o personal): ")

	departamentos = []
	for f in range(len(fichero)):
		if dep.upper() == fichero[f][28:36]:
			departamentos.append(fichero[f])
	print("\nEmpleados del departamento " + dep.lower())
	for j in departamentos:
		print(j)

	

def ejercicio7():
	f = []
	for linea in open("ventas.txt", "r"):
		cod, fecha, sueldo, departamento = linea.strip().split("; ")
		fecha = datetime.strptime(fecha, "%d-%m-%Y")
		sueldo = int(sueldo[:-1])
		f.append((cod, fecha, sueldo, departamento))
	ordenados = sorted(f, key = lambda x: x[2])
	for imprimir in ordenados:
		print(imprimir[0], imprimir[1].strftime("%d-%m-%Y"), str(imprimir[2])+"€", imprimir[3])

def ejercicio8():
	with open("ventas.txt", "r") as f:
		lineas = f.readlines()
	empleados = []
	edades = []
	for linea in lineas:
		datos = linea.split("; ")
		cod = datos[0]
		fec = datetime.strptime(datos[1], "%d-%m-%Y")
		empleados.append((cod, fec))
	mayor = None
	for emp in empleados:
		edad = (datetime.now() - emp[1]).days // 365
		if mayor is None or edad > mayor[1]:
			mayor = (emp[0], edad)
	menor = None
	for emp in empleados:
		edad = (datetime.now() - emp[1]).days // 365
		edades.append(edad)
		if menor is None or edad < menor[1]:
			menor = (emp[0], edad)
	print("La persona más mayor es:", mayor[0], "con", mayor[1], "años.")
	print("La persona más joven es:", menor[0], "con", menor[1], "años.")
	print("La media de edades es:", sum(edades)/10, "años")
    

def ejercicio9():
    with open("ventas.txt", "r+") as file:
        lineas = file.readlines()
        ultimo = lineas[-1].strip().split("; ")
        codigo, fecha, sueldo, departamento  = ultimo
        nuevocod = int(codigo[-3:]) + 1
        cod = "COD_" + str(nuevocod).zfill(3)
        sueldo = int(input("Introduce el sueldo: "))
        departamento = input("Introduce el departamento: ")
        fecha = input("Introduce una fecha en formato dd-mm-yyyy: ")
        while True:
            try:
                fec = datetime.strptime(fecha, "%d-%m-%Y")
                break
            except ValueError:
                fecha = input("Fecha incorrecta. Introduce una fecha en formato dd-mm-yyyy: ")
        file.write(cod + "; " + str(fec.strftime("%d-%m-%Y")) + "; " + str(sueldo) + "€; " + departamento + "\n")
        file.close()
		

def ejercicio10():
    codigo = input("Introduce el número del código: ")
    with open("ventas.txt", "r") as file:
        lineas = file.readlines()
    with open("ventas.txt", "w") as file:
        for linea in lineas:
            if not linea.startswith("COD_" + codigo.zfill(3)):
                file.write(linea)
    print("Línea eliminada correctamente")
    
def ejercicio11():
	codigo = input("Introduce el número del código: ")
	with open("ventas.txt", "r") as file:
		lineas = file.readlines()
	for linea in lineas:
		if linea.startswith("COD_" + codigo.zfill(3)):
			print(linea)
    





while True:
	# Mostramos el menu
	menu()
	opcionMenu = input("Elija una opción >> ")
	if opcionMenu=="1":
		print ("\n======== Ejercicio 1 ========")
		ejercicio1()
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
	elif opcionMenu=="11":
			print ("\n======== Ejercicio 11 ========")
			ejercicio11()
			input("\npulsa enter para continuar")
	elif opcionMenu=="0":
		break
	else:
		print ("")
		input("\npulsa enter para continuar")
