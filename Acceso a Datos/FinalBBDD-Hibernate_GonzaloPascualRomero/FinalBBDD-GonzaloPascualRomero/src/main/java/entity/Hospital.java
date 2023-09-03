package entity;

import jakarta.persistence.*;

@Entity
@NamedQuery(name = "Visualizar", query= "SELECT e FROM Hospital e ")
public class Hospital {

    @Override
    public String toString() {
        return "Hospital{" +
                "idHospital=" + idHospital +
                ", nombre='" + nombre + '\'' +
                ", direccion='" + direccion + '\'' +
                '}';
    }

    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Id
    @Column(name = "id_hospital")
    private int idHospital;
    @Basic
    @Column(name = "nombre")
    private String nombre;
    @Basic
    @Column(name = "direccion")
    private String direccion;

    public int getIdHospital() {
        return idHospital;
    }

    public void setIdHospital(int idHospital) {
        this.idHospital = idHospital;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;

        Hospital hospital = (Hospital) o;

        if (idHospital != hospital.idHospital) return false;
        if (nombre != null ? !nombre.equals(hospital.nombre) : hospital.nombre != null) return false;
        if (direccion != null ? !direccion.equals(hospital.direccion) : hospital.direccion != null) return false;

        return true;
    }

    @Override
    public int hashCode() {
        int result = idHospital;
        result = 31 * result + (nombre != null ? nombre.hashCode() : 0);
        result = 31 * result + (direccion != null ? direccion.hashCode() : 0);
        return result;
    }
}
