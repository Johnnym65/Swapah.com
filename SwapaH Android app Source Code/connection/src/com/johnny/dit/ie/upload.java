package com.johnny.dit.ie;

import java.io.ByteArrayOutputStream;
import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;

import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.URL;

import java.util.ArrayList;

import org.apache.http.HttpResponse;

import org.apache.http.NameValuePair;

import org.apache.http.client.HttpClient;

import org.apache.http.client.entity.UrlEncodedFormEntity;

import org.apache.http.client.methods.HttpPost;

import org.apache.http.impl.client.DefaultHttpClient;

import org.apache.http.message.BasicNameValuePair;

import android.app.Activity;
import android.content.Intent;

import android.graphics.Bitmap;

import android.graphics.BitmapFactory;

import android.os.Bundle;

import android.widget.Toast;

 

public class upload extends Activity {
	
	String path;
	String iid;
	String image;
	@Override
	public void onCreate(Bundle savedInstanceState) {
	    super.onCreate(savedInstanceState);
	    
    Bundle bundle = getIntent().getExtras();
	path = bundle.getString("path");
	iid = bundle.getString("iid");
	image = bundle.getString("image");
	

	HttpURLConnection connection = null;
	DataOutputStream outputStream = null;
	DataInputStream inputStream = null;

	String pathToOurFile = path;
	String urlServer = "http://swapah.com/upload_image.php?iid="+iid+"&image="+image;
	String lineEnd = "\r\n";
	String twoHyphens = "--";
	String boundary =  "*****";

	int bytesRead, bytesAvailable, bufferSize;
	byte[] buffer;
	int maxBufferSize = 1*1024*1024;

	try
	{
	FileInputStream fileInputStream = new FileInputStream(new File(pathToOurFile) );

	URL url = new URL(urlServer);
	connection = (HttpURLConnection) url.openConnection();

	// Allow Inputs & Outputs
	connection.setDoInput(true);
	connection.setDoOutput(true);
	connection.setUseCaches(false);

	// Enable POST method
	connection.setRequestMethod("POST");

	connection.setRequestProperty("Connection", "Keep-Alive");
	connection.setRequestProperty("Content-Type", "multipart/form-data;boundary="+boundary);

	outputStream = new DataOutputStream( connection.getOutputStream() );
	outputStream.writeBytes(twoHyphens + boundary + lineEnd);
	outputStream.writeBytes("Content-Disposition: form-data; name=\"uploadedfile\";filename=\"" + pathToOurFile +"\"" + lineEnd);
	outputStream.writeBytes(lineEnd);

	bytesAvailable = fileInputStream.available();
	bufferSize = Math.min(bytesAvailable, maxBufferSize);
	buffer = new byte[bufferSize];

	// Read file
	bytesRead = fileInputStream.read(buffer, 0, bufferSize);

	while (bytesRead > 0)
	{
	outputStream.write(buffer, 0, bufferSize);
	bytesAvailable = fileInputStream.available();
	bufferSize = Math.min(bytesAvailable, maxBufferSize);
	bytesRead = fileInputStream.read(buffer, 0, bufferSize);
	}

	outputStream.writeBytes(lineEnd);
	outputStream.writeBytes(twoHyphens + boundary + twoHyphens + lineEnd);

	// Responses from the server (code and message)
	int serverResponseCode = connection.getResponseCode();
	String serverResponseMessage = connection.getResponseMessage();

	fileInputStream.close();
	outputStream.flush();
	outputStream.close();
	}
	catch (Exception ex)
	{
	//Exception handling
	}
	
	Intent myIntent = new Intent(upload.this, showitem.class);
	 myIntent.putExtra("iid", iid);
    myIntent.putExtra("photonum", image);
    
    startActivity(myIntent);
    finish();
       
	

}

}
