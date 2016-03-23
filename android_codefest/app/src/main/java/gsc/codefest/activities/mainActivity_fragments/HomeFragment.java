package gsc.codefest.activities.mainActivity_fragments;

import android.app.DatePickerDialog;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.support.v4.app.Fragment;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.google.gson.Gson;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.HashMap;
import java.util.Map;

import gsc.codefest.R;
import gsc.codefest.activities.LoginActivity;
import gsc.codefest.activities.MainActivity;
import gsc.codefest.app.AppConfig;
import gsc.codefest.app.AppController;
import gsc.codefest.constructors.absence_constr.absence_root;
import gsc.codefest.helper.SQLiteHandler;

public class  HomeFragment extends Fragment {
    private static final String TAG = HomeFragment.class.getSimpleName();
    EditText sickFrom_editText;
    EditText sickTill_editText;
    String timePeriodID;
    private ProgressDialog pDialog;
    ArrayAdapter<String> adapter;
    private SQLiteHandler db;

    public HomeFragment(){}

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View rootView = inflater.inflate(R.layout.fragment_home, container, false);
        return rootView;
    }

    @Override
    public void onViewCreated(final View rootView, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(rootView, savedInstanceState);
        final String TAG = HomeFragment.class.getSimpleName();


        pDialog = new ProgressDialog(getActivity());
        pDialog.setCancelable(false);

            ImageButton sickFrom_imageButton = (ImageButton) rootView.findViewById(R.id.sickFrom_imageButton);
            ImageButton sickTill_imageButton = (ImageButton) rootView.findViewById(R.id.sickTill_imageButton);
            Button sendSickPeriod_button = (Button) rootView.findViewById(R.id.sendSickPeriod_button);

            sickFrom_imageButton.setOnClickListener(new View.OnClickListener(){
                @Override
                public void onClick (View v){
                    timePeriodID = "sickFrom";
                    selectDate(rootView);
                }
            });

            sickTill_imageButton.setOnClickListener(new View.OnClickListener(){
                @Override
                public void onClick (View v) {
                    timePeriodID = "sickTill";
                    selectDate(rootView);
                }
            });

            sickFrom_editText=(EditText)rootView.findViewById(R.id.sickFrom_editText);
            sickTill_editText=(EditText)rootView.findViewById(R.id.sickTill_editText);


            sendSickPeriod_button.setOnClickListener(new View.OnClickListener(){
                @Override
                public void onClick (View v){
                    storePeriodRequest(rootView);
                }
            });


        }

    public void selectDate(View view) {
        android.support.v4.app.DialogFragment newFragment = new SelectDateFragment();
        newFragment.show(getActivity().getSupportFragmentManager(), "DatePicker");
    }

    public void populateSetDate(int year, int month, int day) {

        switch(timePeriodID){
            case "sickFrom":
                sickFrom_editText.setText(month + "/" + day + "/" + year);
                break;
            case "sickTill":
                sickTill_editText.setText(month + "/" + day + "/" + year);
                break;
            default:
                System.out.println("timePeriodID switch didn't hit any case");
                break;
        }

    }

    public void storePeriodRequest(View rootView){
        showDialog();
        //db = new SQLiteHandler(getActivity().getApplicationContext());
        String tag_string_req = "req_requestPeriodOff";

        final String sickFrom_editText_String = sickFrom_editText.getText().toString().trim();
        final String sickTill_editText_String = sickTill_editText.getText().toString().trim();
        final Spinner spinner = (Spinner) rootView.findViewById(R.id.absenceStatus_spinner);
        String status = "0";
        switch(spinner.getSelectedItem().toString()){
            case "Sick":
                status = "1";
                break;
            case "Vacation":
                status = "2";
                break;
            default:
                System.out.println("timePeriodID switch didn't hit any case");
                break;
        }

        if(!sickFrom_editText_String.isEmpty() || sickTill_editText_String.isEmpty()){
            final String finalStatus = status;
            StringRequest strReq = new StringRequest(Request.Method.POST, AppConfig.URL_REGISTER, new Response.Listener<String>() {

                @Override
                public void onResponse(String response) {
                    Log.d(TAG, "Register Response: " + response);
                    hideDialog();


                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Log.e(TAG, "Registration Error: " + error.getMessage());
                    Toast.makeText(getActivity().getApplicationContext(), error.getMessage(), Toast.LENGTH_LONG).show();
                    hideDialog();
                }
            }) {

                @Override
                protected Map<String, String> getParams() {
                    Map<String, String> params = new HashMap<String, String>();
                    params.put("username", (MainActivity.user_id));
                    params.put("startDate", (sickFrom_editText_String));
                    params.put("endDate", (sickTill_editText_String));
                    params.put("status", (finalStatus));
                    return params;
                }

            };
            AppController.getInstance().addToRequestQueue(strReq, tag_string_req);
        } else{
            Toast.makeText(getActivity().getApplicationContext(), "Please fill in all required info", Toast.LENGTH_LONG).show();
        }

    }
    private void showDialog() {
        if (!pDialog.isShowing()) {
            pDialog.show();
        }
    }

    private void hideDialog() {
        if (pDialog.isShowing()) {
            pDialog.dismiss();
        }
    }

    public class SelectDateFragment extends android.support.v4.app.DialogFragment implements DatePickerDialog.OnDateSetListener {
        @Override
        public Dialog onCreateDialog(Bundle savedInstanceState) {
            final Calendar calendar = Calendar.getInstance();
            int yy = calendar.get(Calendar.YEAR);
            int mm = calendar.get(Calendar.MONTH);
            int dd = calendar.get(Calendar.DAY_OF_MONTH);
            return new DatePickerDialog(getActivity(), this, yy, mm, dd);
        }

        public void onDateSet(DatePicker view, int yy, int mm, int dd) {
            populateSetDate(yy, mm+1, dd);
        }
    }


}
