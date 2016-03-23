package gsc.codefest.activities.mainActivity_fragments;

import android.support.v4.app.Fragment;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import gsc.codefest.R;

public class OverviewFragment extends Fragment {
	
	public OverviewFragment(){}
	
	
	@Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
            Bundle savedInstanceState) {
 
        View rootView = inflater.inflate(R.layout.fragment_overview, container, false);
         
        return rootView;
    }
}
