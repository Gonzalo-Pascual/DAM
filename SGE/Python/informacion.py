import random
from datetime import datetime,timedelta

departamentos=["ADMIN","FINAN","PERSO"]
fecha=datetime.strptime("23-12-1990", "%d-%m-%Y") #El trptime sirve para convertirn una cadena de fecha y hora en un objeto datetime 
fec=fecha
cod=1


f=open("INFORMACION.txt","w")
while cod<101:
    codigo="COD-"+str(cod).zfill(3)
    sueldo=random.randrange(1000,9999) #randrange es igual que randint pero randrange puede tener incrementos personalizados
    departamento=random.choice(departamentos)
    alea=random.randrange(0,3000)
    fec=fecha+timedelta(days=alea)
    f.write(codigo+" "+str(fec.strftime("%d-%m-%Y"))[0:10]+" "+str(sueldo)+" "+departamento+"\n")
    cod+=1
f.close()

def leer_fichero():
    f=[]
    for linea in open("INFORMACION.txt","r"):
        f.append(linea.rstrip('\n'))
    return f

with open("INFORMACION.txt", "r") as file:
    contents = file.read()
    print(contents)

def menu():
    print('\n\n\n')
    print('_____________________________________________________________________')
    print('____________________________________MENU_____________________________\n')
    print('\t\t1_Código de la persona o personas que más ganan(1)')
    print('\t\t2_Sueldo medio por departamento(2)')
    print('\t\t3_Personas nacidas en el año elegido(3)')
    print('\t\t4_Salir(4)')
    print('_____________________________________________________________________')
    
    a=input('\n\tSeleccione una opcion: ')

    if a=='1':
        fichero=leer_fichero()
                 
        registros={}
        for f in range(len(fichero)):
            registros[fichero[f][0:7]]=int(fichero[f][19:23])
        
        maximo=max(registros.values())
        
        for key,value in registros.items():
            if value==maximo:
                print("\n\n\tEl salario del trabajador",key,"es el mas alto")
        menu()
    elif a=='2':
        fichero=leer_fichero()

        registros=[]
        for f in range(len(fichero)):
            registros.append([fichero[f][24:29],fichero[f][19:23]])
        """print(registros)"""

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
        print('\n\n\tMedias de los sueldos por departamentos:')
        for i in medias:
            print('\t\t\tDepartamento:',i[0],'\tMedia:',i[1])
        menu()
    elif a=='3':
        fichero=leer_fichero()
            
        ano=int(input('\n\n\tIntroduzca año de nacimiento: '))
        nacidos=[]
        for f in range(len(fichero)):
            if ano==int(fichero[f][14:18]):
                nacidos.append(fichero[f][0:7])

        print('\tPersonas nacidas en',ano,':',len(nacidos))
        for n in nacidos:
            print('\t\tCódigo de persona:',n)
        menu()
    elif a=='4':
        return 0
    else:
        print('Valor introducido erroneo')
        menu()
menu()

