package entity;

import jakarta.persistence.*;

@Entity
public class Plantilla {
    @Override
    public String toString() {
        return "Plantilla{" +
                "idPlantilla=" + idPlantilla +
                ", nombre='" + nombre + '\'' +
                ", apellido='" + apellido + '\'' +
                ", especialidad='" + especialidad + '\'' +
                ", idHospital=" + idHospital +
                '}';
    }

    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Id
    @Column(name = "id_plantilla")
    private int idPlantilla;
    @Basic
    @Column(name = "nombre")
    private String nombre;
    @Basic
    @Column(name = "apellido")
    private String apellido;
    @Basic
    @Column(name = "especialidad")
    private String especialidad;
    @Basic
    @Column(name = "id_hospital")
    private int idHospital;

    public int getIdPlantilla() {
        return idPlantilla;
    }

    public void setIdPlantilla(int idPlantilla) {
        this.idPlantilla = idPlantilla;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellido() {
        return apellido;
    }

    public void setApellido(String apellido) {
        this.apellido = apellido;
    }

    public String getEspecialidad() {
        return especialidad;
    }

    public void setEspecialidad(String especialidad) {
        this.especialidad = especialidad;
    }

    public int getIdHospital() {
        return idHospital;
    }

    public void setIdHospital(int idHospital) {
        this.idHospital = idHospital;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;

        Plantilla plantilla = (Plantilla) o;

        if (idPlantilla != plantilla.idPlantilla) return false;
        if (idHospital != plantilla.idHospital) return false;
        if (nombre != null ? !nombre.equals(plantilla.nombre) : plantilla.nombre != null) return false;
        if (apellido != null ? !apellido.equals(plantilla.apellido) : plantilla.apellido != null) return false;
        if (especialidad != null ? !especialidad.equals(plantilla.especialidad) : plantilla.especialidad != null)
            return false;

        return true;
    }

    @Override
    public int hashCode() {
        int result = idPlantilla;
        result = 31 * result + (nombre != null ? nombre.hashCode() : 0);
        result = 31 * result + (apellido != null ? apellido.hashCode() : 0);
        result = 31 * result + (especialidad != null ? especialidad.hashCode() : 0);
        result = 31 * result + idHospital;
        return result;
    }
}
