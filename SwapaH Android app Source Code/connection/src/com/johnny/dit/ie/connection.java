package com.johnny.dit.ie;
import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

//import com.johnny.labber2.R;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.net.Uri;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;


public class connection extends Activity {
/** Called when the activity is first created. */
   
  
@Override
public void onCreate(Bundle savedInstanceState) {
    super.onCreate(savedInstanceState);
    setContentView(R.layout.main);
    
    final EditText uname = (EditText) findViewById(R.id.uname);
    final EditText pword = (EditText) findViewById(R.id.pword);
    
    final Button button = (Button) findViewById(R.id.login);
    
    if(!isNetworkAvailable())
    {
    	button.setEnabled(false);
    }
    
    button.setOnClickListener(new View.OnClickListener() {
        public void onClick(View v) {
            // Perform action on click
        	/*
        	Context context = getApplicationContext();
        	CharSequence text = "Hello toast!";
        	int duration = Toast.LENGTH_SHORT;

        	Toast toast = Toast.makeText(context, text, duration);
        	toast.show();*/
        	//startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse("content://media/external/images/media"))); 

        	Intent myIntent = new Intent(connection.this, login.class);
        	myIntent.putExtra("uname", uname.getText().toString());
        	myIntent.putExtra("pword", pword.getText().toString());
        	connection.this.startActivity(myIntent);
        }
    });




}


private boolean isNetworkAvailable() {
    ConnectivityManager connectivityManager 
          = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
    NetworkInfo activeNetworkInfo = connectivityManager.getActiveNetworkInfo();
    
    Log.e("log_tag",activeNetworkInfo.toString());
    return activeNetworkInfo != null;
}

    
}