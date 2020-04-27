package com.example.penilaian;

public class Nilai {
    private String name;
    private String surname;
    private String marks;

    public Nilai(String name, String surname, String marks) {
        this.name = name;
        this.surname = surname;
        this.marks = marks;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getSurname() {
        return surname;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }

    public String getMarks() {
        return marks;
    }

    public void setMarks(String marks) {
        this.marks = marks;
    }
}
