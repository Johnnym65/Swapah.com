package com.johnny.dit.ie;

import java.io.IOException; 
import java.io.InputStream; 
import java.net.HttpURLConnection; 
import java.net.MalformedURLException; 
import java.net.URL; 
import android.app.Activity; 
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Bitmap; 
import android.graphics.BitmapFactory; 
import android.graphics.Color;
import android.net.Uri;
import android.os.Bundle; 
import android.provider.MediaStore;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView; 
import android.widget.TextView;



public class showitem extends Activity {

	 String iid;
	 String title;
	 String photonum = "0";
	 Bitmap bmp; 
     URL url = null; 
     TextView t;
     TextView photo;
     
     @Override 
     public void onCreate(Bundle icicle) { 
     super.onCreate(icicle); 
     setContentView(R.layout.showitem); 
     final Button add = (Button) findViewById(R.id.add);
     t = (TextView) findViewById(R.id.top);
     photo = (TextView) findViewById(R.id.photo);
     
       
	 Bundle bundle = getIntent().getExtras();
	 iid = bundle.getString("iid");
	 title = bundle.getString("title");
	 t.setText(title);
	 t.setTextColor(Color.parseColor("#0080FF"));
	 t.setTextSize(20);
	 photonum = bundle.getString("photonum");
	 
	 if(photonum == "0" || photonum == null)
	 {
		 photonum = "1";
	 }
	 
	 photo.setText("Photo: "+photonum);
	 photo.setTextColor(Color.parseColor("#6E6E6E"));
	 
    
     
     String str="http://swapah.com/image/upload/"+iid+photonum+".jpg"; 
     ImageView imView = (ImageView)findViewById(R.id.imview); 
     //url="http://images.orkut.com/orkut/photos/OgAAADG3_VXKdNE9-VI1jHhG_KvV-2H-..."; 
     try{ 
     url = new URL(str); 
     } 
     catch(MalformedURLException e) 
     { 
             e.printStackTrace(); 
     } 
     try{ 
             HttpURLConnection conn =  (HttpURLConnection)url.openConnection(); 
             conn.setDoInput(true); 
             conn.connect(); 
             int length = conn.getContentLength(); 
             int[] bitmapData =new int[length]; 
             byte[] bitmapData2 =new byte[length]; 
             InputStream is = conn.getInputStream(); 
             bmp = BitmapFactory.decodeStream(is); 
             
             
             imView.setImageBitmap(bmp); 
             imView.getLayoutParams().height = 200;
             
             } catch (IOException e) 
             { 
                     e.printStackTrace(); 
             } 
     
     
     
     
     
     
     
     final Button button = (Button) findViewById(R.id.next);
     if(photonum.contains("5"))
     {
    	 button.setEnabled(false);
     }
	     button.setOnClickListener(new View.OnClickListener() {
	         public void onClick(View v) {
	        	 
	        	 int photonum2 = Integer.parseInt(photonum);
	        	 photonum2++;
	        	 
	        	 Intent myIntent = new Intent(showitem.this, showitem.class);
	        	 myIntent.putExtra("iid", iid);
	        	 myIntent.putExtra("title", title);
	             myIntent.putExtra("photonum", Integer.toString(photonum2));
	             
	
	             startActivity(myIntent);
	             finish();
	        	 
	         }
	     });
     
     
     final Button button1 = (Button) findViewById(R.id.previous);
     
     if(photonum.contains("1"))
     {
    	 button1.setEnabled(false);
     }
     button1.setOnClickListener(new View.OnClickListener() {
         public void onClick(View v) {
        	 
        	 int photonum2 = Integer.parseInt(photonum);
        	 photonum2--;
        	 
        	 Intent myIntent = new Intent(showitem.this, showitem.class);
        	 myIntent.putExtra("iid", iid);
        	 myIntent.putExtra("title", title);
             myIntent.putExtra("photonum", Integer.toString(photonum2));
             
             startActivity(myIntent);
             finish();
        	 
         }
     });
     
     
     
     add.setOnClickListener(new View.OnClickListener() {
         public void onClick(View v) {
        	 
        	 Intent intent = new Intent();
        	 intent.setType("image/*");
        	 intent.setAction(Intent.ACTION_GET_CONTENT);
        	 startActivityForResult(Intent.createChooser(intent, "Select Picture"),1);
        	 
         }
     });
     
     
     
     
} 
     
@Override
public void onActivityResult(int requestCode, int resultCode, Intent data) {
	
	
	
	
     if (resultCode == RESULT_OK) {
    	 if (requestCode == 1) {
    		 // currImageURI is the global variable IÕm using to hold the content:// URI of the image
    		 Uri currImageURI = data.getData();
    		 //t.setText(getRealPathFromURI(currImageURI));
    		 
    		 Intent myIntent = new Intent(showitem.this, upload.class);
        	 myIntent.putExtra("path", getRealPathFromURI(currImageURI));
        	 myIntent.putExtra("iid", iid); 
        	 myIntent.putExtra("image", photonum); 
             startActivity(myIntent);
             finish();
    		 
    		 
    	 }
     }
	
}
     

public String getRealPathFromURI(Uri contentUri) {
    	// can post image
	String [] proj={MediaStore.Images.Media.DATA};
    Cursor cursor = managedQuery( contentUri,
    	proj, // Which columns to return
    	null, // WHERE clause; which rows to return (all rows)
    	null, // WHERE clause selection arguments (none)
    	null); // Order-by clause (ascending by name)
    int column_index = cursor.getColumnIndexOrThrow(MediaStore.Images.Media.DATA);
    cursor.moveToFirst();
    return cursor.getString(column_index);
}

	   
    
}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*
	    super.onCreate(savedInstanceState);
	    setContentView(R.layout.showitem);
	    
	    Bundle bundle = getIntent().getExtras();
		String iid = bundle.getString("iid");
		
		
		itemid = (TextView) findViewById(R.id.itemid);
		
		itemid.setText(iid);*/
	    
	    
	


