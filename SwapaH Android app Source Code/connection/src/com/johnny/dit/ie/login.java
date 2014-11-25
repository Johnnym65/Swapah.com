package com.johnny.dit.ie;
import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.UnsupportedEncodingException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
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
import android.app.ListActivity;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.AdapterView.OnItemClickListener;


public class login extends Activity {
/** Called when the activity is first created. */
   
   TextView txt;
   int index = 0;

   String username;
   String password;
   String hashpassword;  
   String[] titles;
   String[] iids;
   
   
   
   
@Override
public void onCreate(Bundle savedInstanceState) {
    super.onCreate(savedInstanceState);
    Intent intent = getIntent();
    username = intent.getStringExtra("uname");
    password = intent.getStringExtra("pword");
    
    
    try {
		hashpassword = SHA1(password);
	} catch (NoSuchAlgorithmException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	} catch (UnsupportedEncodingException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	}
    
	
	/*
    Context context = getApplicationContext();
	int duration = Toast.LENGTH_LONG;

	Toast toast = Toast.makeText(context, hashpassword, duration);
	toast.show();*/
    
    
    
    //setContentView(R.layout.list);
    // Create a crude view - this should really be set via the layout resources  
    // but since its an example saves declaring them in the XML.  
  
	
	
	setContentView(R.layout.list);
    
	
	final ListView lv = (ListView) findViewById(R.id.ListViewId);
	try {
	lv.setAdapter(new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1, getServerData(KEY_121)));
	 
	}catch(Exception e){
		
		Context context = getApplicationContext();
        CharSequence text = "No Connection";
        int duration = Toast.LENGTH_SHORT;

        Toast toast = Toast.makeText(context, text, duration);
        toast.show();
		
		
        Intent myIntent = new Intent(login.this, connection.class);

        startActivity(myIntent);
        
		
		
	}
    //setListAdapter(new ArrayAdapter<String>(this, R.layout.list, getServerData(KEY_121)));

	/*setListAdapter(new ArrayAdapter<String>(this, 
	R.layout.list, getServerData(KEY_121)));
	   
	final ListView lv = getListView();
	lv.setTextFilterEnabled(true);
	
	*/
	lv.setOnItemClickListener(new OnItemClickListener() {
	       public void onItemClick(AdapterView<?> parent, View view,
	           int position, long id) {
	        
	    	   String selectedFromList = (String) (lv.getItemAtPosition(position));
	    	   
	    	   /*
	    	   Context context = getApplicationContext();
	    	   int duration = Toast.LENGTH_SHORT;
	    	   Toast toast = Toast.makeText(context, iids[position], duration);
	    	   toast.show();*/
	    	   
	    	   Intent myIntent = new Intent(login.this, showitem.class);
               myIntent.putExtra("iid", iids[position]);
               myIntent.putExtra("title", titles[position]);
               
               

               startActivity(myIntent);
	    	   
	    	   
	       }
    });
	
	
	
	
	
    
   
    
    
    

    // Set the text and call the connect function.  
    //txt.setText("Connecting..."); 
  //call the method to run the data retreival
    



}
public static final String KEY_121 = "http://swapah.com/androidtest.php"; //i use my real ip here


//@Override
//protected void onListItemClick(ListView l, View v, int position, long id)
//{
//    super.onListItemClick(l, v, position, id);
//    
//}


private String[] getServerData(String returnString) {
    
   InputStream is = null;
    
   String result = "";
    //the year data to send
    ArrayList<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
    nameValuePairs.add(new BasicNameValuePair("year",username));
    nameValuePairs.add(new BasicNameValuePair("pword",hashpassword));

    //http post
    try{
            HttpClient httpclient = new DefaultHttpClient();
            HttpPost httppost = new HttpPost(KEY_121);
            httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
            HttpResponse response = httpclient.execute(httppost);
            HttpEntity entity = response.getEntity();
            is = entity.getContent();

    }catch(Exception e){
            Log.e("log_tag", "Error in http connection "+e.toString());
            
            /*
            Context context = getApplicationContext();
            CharSequence text = "No Connection";
            int duration = Toast.LENGTH_SHORT;

            Toast toast = Toast.makeText(context, text, duration);
            toast.show();
            
            Intent myIntent = new Intent(login.this, connection.class);

            startActivity(myIntent);
            */
    }

    //convert response to string
    try{
            BufferedReader reader = new BufferedReader(new InputStreamReader(is,"iso-8859-1"),8);
            StringBuilder sb = new StringBuilder();
            String line = null;
            while ((line = reader.readLine()) != null) {
                    sb.append(line + "\n");
            }
            is.close();
            result=sb.toString();
    }catch(Exception e){
            Log.e("log_tag", "Error converting result "+e.toString());
            
            Context context = getApplicationContext();
            CharSequence text = "Wrong Password";
            int duration = Toast.LENGTH_SHORT;
            
            Intent myIntent = new Intent(login.this, connection.class);

            startActivity(myIntent);

            //Toast toast = Toast.makeText(context, text, duration);
            //toast.show();
    }
    //parse json data
    
    try{
    	JSONArray jArray = new JSONArray(result);
		titles = new String[jArray.length()];
		iids = new String[jArray.length()];
            
            for(int i=0;i<jArray.length();i++){
                    JSONObject json_data = jArray.getJSONObject(i);
                    Log.i("log_tag","Username: "+json_data.getString("Title")+
                    		"iid: "+json_data.getString("Item_id")
                            
                    );
                                                         
	                    
	                    
	                    //TextView title = new TextView(getApplicationContext());
	                    //title.setText("hello");
	                    //TextView description;
	                    //TextView condition;
	                    
	                    //uname = (TextView)findViewById(R.id.uname); 
	                    //location = (TextView)findViewById(R.id.location); 
	                    //email = (TextView)findViewById(R.id.email);
	                    
	                    
	                    //location.setText(json_data.getString("Description"));
	                    //email.setText(json_data.getString("Condition"));
	                    
	                    titles[i] = json_data.getString("Title");
	                    
	                    iids[i] = json_data.getString("Item_id");
	                   // uname.setText(titles[index]);
	                    
	                    
	                    
	                    
	                    
	                   
                    
                    
                    //Get an output to the screen
                    returnString += "\n\t" + jArray.getJSONObject(i); 
            }
            return titles; 
    }catch(JSONException e){
            Log.e("log_tag", "Error parsing data "+e.toString());
            
            Context context = getApplicationContext();
            CharSequence text = "Wrong Username/Password";
            int duration = Toast.LENGTH_SHORT;

            Toast toast = Toast.makeText(context, text, duration);
            toast.show();
            
            Intent myIntent = new Intent(login.this, connection.class);

            startActivity(myIntent);
            finish();
            
    }
    return null; 
}    




private static String convertToHex(byte[] data) { 
    StringBuffer buf = new StringBuffer();
    for (int i = 0; i < data.length; i++) { 
        int halfbyte = (data[i] >>> 4) & 0x0F;
        int two_halfs = 0;
        do { 
            if ((0 <= halfbyte) && (halfbyte <= 9)) 
                buf.append((char) ('0' + halfbyte));
            else 
                buf.append((char) ('a' + (halfbyte - 10)));
            halfbyte = data[i] & 0x0F;
        } while(two_halfs++ < 1);
    } 
    return buf.toString();
} 

public static String SHA1(String text) throws NoSuchAlgorithmException, UnsupportedEncodingException  { 
    MessageDigest md = MessageDigest.getInstance("SHA-1");
    byte[] sha1hash = new byte[40];
    md.update(text.getBytes("iso-8859-1"), 0, text.length());
    sha1hash = md.digest();
    return convertToHex(sha1hash);
} 





    
}
