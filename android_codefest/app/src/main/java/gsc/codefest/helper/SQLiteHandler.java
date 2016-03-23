/**
 * Author: Ravi Tamada
 * URL: www.androidhive.info
 * twitter: http://twitter.com/ravitamada
 * */
package gsc.codefest.helper;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

import java.util.HashMap;

public class SQLiteHandler extends SQLiteOpenHelper {

	private static final String TAG = SQLiteHandler.class.getSimpleName();

	private static final int DATABASE_VERSION = 1;
	private static final String DATABASE_NAME = "codefest";
	private static final String TABLE_USER = "user";

	// Login Table Columns names
	private static final String KEY_ID = "id";
	private static final String KEY_USERNAME = "username";
	private static final String KEY_ROLDID = "role_id";
	private static final String KEY_FIRSTNAME = "firstname";
	private static final String KEY_LASTNAME = "lastname";
	private static final String KEY_DEPEARTMENTID = "department_id";
	private static final String KEY_PTF_ID = "ptf_id";


	//$username, $password, $role_id, $firstname, $lastname, $department_id, $ptd_id
	public SQLiteHandler(Context context) {
		super(context, DATABASE_NAME, null, DATABASE_VERSION);
	}

	// Creating Tables
	@Override
	public void onCreate(SQLiteDatabase db) {
		String CREATE_LOGIN_TABLE = "CREATE TABLE " + TABLE_USER + "("
				+ KEY_ID + " INTEGER PRIMARY KEY,"
				+ KEY_USERNAME + " TEXT,"
				+ KEY_ROLDID + " INTEGER," + " TEXT UNIQUE,"
				+ KEY_FIRSTNAME + " TEXT,"
				+ KEY_LASTNAME + " TEXT,"
				+ KEY_DEPEARTMENTID + " INTEGER,"
				+ KEY_PTF_ID + " INTEGER"
				+ ")";
		db.execSQL(CREATE_LOGIN_TABLE);
		Log.d(TAG, "Database tables created");
	}

	// Upgrading database
	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
		// Drop older table if existed
		db.execSQL("DROP TABLE IF EXISTS " + TABLE_USER);

		// Create tables again
		onCreate(db);
	}

	/**
	 * Storing user details in database
	 * */

	public void addUser(String username, int role_id, String firstname, String lastname, int department_id, int ptf_id) {
		SQLiteDatabase db = this.getWritableDatabase();

		ContentValues values = new ContentValues();
		values.put(KEY_USERNAME, username); // Name
		values.put(KEY_ROLDID, role_id); // username
		values.put(KEY_FIRSTNAME, firstname); // uid
		values.put(KEY_LASTNAME, lastname); // uid
		values.put(KEY_DEPEARTMENTID, department_id); // uid
		values.put(KEY_PTF_ID, ptf_id); // uid

		// Inserting Row
		long id = db.insert(TABLE_USER, null, values);
		db.close(); // Closing database connection

		Log.d(TAG, "New user inserted into sqlite: " + id);
	}


	public HashMap<String, String> getUserDetails() {
		HashMap<String, String> user = new HashMap<String, String>();
		String selectQuery = "SELECT  * FROM " + TABLE_USER;

		SQLiteDatabase db = this.getReadableDatabase();
		Cursor cursor = db.rawQuery(selectQuery, null);
		// Move to first row
		cursor.moveToFirst();
		if (cursor.getCount() > 0) {

			user.put("id", cursor.getString(1));
			user.put("username", cursor.getString(2));
			user.put("role_id", cursor.getString(3));
			user.put("firstname", cursor.getString(4));
			user.put("lastname", cursor.getString(5));
			user.put("department_id", cursor.getString(6));
			user.put("ptf_id", cursor.getString(71));
		}
		cursor.close();
		db.close();
		// return user
		Log.d(TAG, "Fetching user from Sqlite: " + user.toString());

		return user;
	}

	/**
	 * Re crate database Delete all tables and create them again
	 * */
	public void deleteUsers() {
		SQLiteDatabase db = this.getWritableDatabase();
		// Delete All Rows
		db.delete(TABLE_USER, null, null);
		db.close();

		Log.d(TAG, "Deleted all user info from sqlite");
	}

}
