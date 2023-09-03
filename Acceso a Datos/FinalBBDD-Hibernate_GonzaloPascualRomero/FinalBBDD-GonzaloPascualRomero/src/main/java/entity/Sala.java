package entity;

import jakarta.persistence.*;

@Entity
public class Sala {
    @Override
    public String toString() {
        return "Sala{" +
                "idSala=" + idSala +
                ", nombre='" + nombre + '\'' +
                ", tipo='" + tipo + '\'' +
                ", idHospital=" + idHospital +
                '}';
    }

    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Id
    @Column(name = "id_sala")
    private int idSala;
    @Basic
    @Column(name = "nombre")
    private String nombre;
    @Basic
    @Column(name = "tipo")
    private String tipo;
    @Basic
    @Column(name = "id_hospital")
    private int idHospital;

    public int getIdSala() {
        return idSala;
    }

    public void setIdSala(int idSala) {
        this.idSala = idSala;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
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

        Sala sala = (Sala) o;

        if (idSala != sala.idSala) return false;
        if (idHospital != sala.idHospital) return false;
        if (nombre != null ? !nombre.equals(sala.nombre) : sala.nombre != null) return false;
        if (tipo != null ? !tipo.equals(sala.tipo) : sala.tipo != null) return false;

        return true;
    }

    @Override
    public int hashCode() {
        int result = idSala;
        result = 31 * result + (nombre != null ? nombre.hashCode() : 0);
        result = 31 * result + (tipo != null ? tipo.hashCode() : 0);
        result = 31 * result + idHospital;
        return result;
    }
}
