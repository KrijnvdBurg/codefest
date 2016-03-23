package gsc.codefest.constructors.absence_constr;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class absence_root {
    public boolean error;
    public ArrayList<absence_status> status = new ArrayList();

    public boolean getError() {
        return error;
    }
    public void setError(boolean error) { this.error = error; }




    public absence_status status(int pos) {
        return status.get(pos);
    }


}


/*final ArrayList<String> statusList = new ArrayList<String>();
        final Spinner spinner = (Spinner) rootView.findViewById(R.id.absenceStatus_spinner);

        StringRequest strReq = new StringRequest(Request.Method.POST, AppConfig.URL_ABSENCEKEYS, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Gson gson = new Gson();
                absence_root absence_root = gson.fromJson(response, absence_root.class);
                boolean error = absence_root.getError();
                if (!error) {
                    for(int i = 0; i < absence_root.status.size(); i++) {
                        statusList.add(absence_root.status(i).getStatus());
                    }
                } else {
                    System.out.println("absence_root.getError() returned error returned true");
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "onErrorResponse: " + error.getMessage());
                Toast.makeText(getActivity().getApplicationContext(), error.getMessage(), Toast.LENGTH_LONG).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<String, String>();
                params.put("crypt_key", AppConfig.POST_key);
                return params;
            }
        };
        AppController.getInstance().addToRequestQueue(strReq, "req_main");

        ArrayAdapter<String> adapter = new ArrayAdapter<String>(getActivity(), android.R.layout.simple_spinner_item, statusList);
        spinner.setAdapter(adapter);

        spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            public void onItemSelected(AdapterView<?> arg0, View v, int position, long id) {
                spinner.setSelection(position);
            }

            public void onNothingSelected(AdapterView<?> arg0) {
                spinner.setSelection(0);
            }
        });*/
