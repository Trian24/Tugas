package com.example.penilaian;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.database.Cursor;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.EditText;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;


public class MainActivity extends AppCompatActivity {

    DatabaseHelper myDb;
    private DatabaseReference myRef;
    EditText editName,editSurname,editMarks,editTextId;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        editName = findViewById(R.id.editText_name);
        editSurname =findViewById(R.id.editText_surname);
        editMarks = findViewById(R.id.editText_marks);
        editTextId =findViewById(R.id.editTextId);

        myRef = FirebaseDatabase.getInstance().getReference();
    }

    //fungsi menampilkan data
    public void viewAll(View view) {
        // Read from the database
        myRef.child("nilai").addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                StringBuffer buffer = new StringBuffer();
                for(DataSnapshot noteDS : dataSnapshot.getChildren())
                {
                    String mName = noteDS.child("name").getValue().toString();
                    String mSurname = noteDS.child("surname").getValue().toString();
                    String mMarks = noteDS.child("marks").getValue().toString();

                    buffer.append("Nama: "+mName+"\n");
                    buffer.append("Surname: "+mSurname+"\n");
                    buffer.append("Marks: "+mMarks+"\n\n");
                }showMessage("Data found",buffer.toString());
            }

            @Override
            public void onCancelled(DatabaseError error) {
                showMessage("Error",error.getMessage());
            }
        });
    }

    //fungsi menghapus data
    public void delete(View view) {
        Query delete = myRef.child("nilai").orderByChild("name").equalTo(editName.getText().toString());
        delete.addListenerForSingleValueEvent(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                StringBuffer buffer = new StringBuffer();
                for(DataSnapshot deleteDB : dataSnapshot.getChildren())
                {
                    deleteDB.getRef().removeValue();
                }showMessage("Delete Success","Data "+editName.getText().toString()+" Deleted");
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {
                showMessage("Error",databaseError.getMessage());
            }
        });
    }

    //fungsi menambah data
    public void add(View view) {
        // Write a message to the database
        Nilai nilai = new Nilai(editName.getText().toString(), editSurname.getText().toString()
        , editMarks.getText().toString());

        myRef.child("nilai").push().setValue(nilai);
    }

    //fungsi mengupdate data
    public void edit(View view) {
        final Nilai nilai = new Nilai(editName.getText().toString(), editSurname.getText().toString()
                , editMarks.getText().toString());

        Query edit = myRef.child("nilai").orderByChild("name").equalTo(editName.getText().toString());
        edit.addListenerForSingleValueEvent(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                StringBuffer buffer = new StringBuffer();
                for(DataSnapshot editDB : dataSnapshot.getChildren())
                {
                    editDB.getRef().setValue(nilai);
                }showMessage("Edit Success","Data "+editName.getText().toString()+" Edited");
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {
                showMessage("Error",databaseError.getMessage());
            }
        });
    }

    //membuat alert dialog
    public void showMessage(String title, String Message){
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setCancelable(true);
        builder.setTitle(title);
        builder.setMessage(Message);
        builder.show();
    }
}

