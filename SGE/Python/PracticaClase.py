'''lista = []
for i in range(3):
    lista.append(int(input('Introduzca un número:')))
lista.sort()
print (lista)'''
'''tupla =[]
for i in range(3):
    tupla.append(int(input('Introduzca un número:')))
tupla.sort()
tupla2=(tuple(tupla))
lista = list(tupla2)
print (tupla2)
print(lista)
lista.append(9)
tupla2 = tuple(lista)
print(tupla2)
for i in tupla2:
    print(i)'''
'''lista=[]
for i in range(3):
    lista2 = []
    for j in range(2):
        lista2.append(int(input('Introduzca dato:')))
    lista.append(tuple(lista2))
print(lista)
print(lista[1])'''

meses = { 1: "Enero",2: "Febrero",3: "Marzo",4: "Abril",5: "Mayo",6: "Junio",7: "Julio",8: "Agosto",9: "Septiembre",10: "Octubre",11: "Noviembre", 12: "Diciembre"}

print (meses.keys())
print (meses.values())
print(meses.get(3))
print(meses.items())
listas = list(meses.items())
print(listas[2][1])
print(len(listas[2]))

#ejercicio 6

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

