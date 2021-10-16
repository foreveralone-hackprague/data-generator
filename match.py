from scipy import spatial
import numpy as np

# Highest = Automotive
# Result = 721 (719)
test_user_1 = [4672,0,226,0,0,196,0,313,319,0,0,0,323,456,0,0,0,0,0,0,0,0,0,0,0,0,0]

# Highest = Grocery, 2nd = Home
# Result = 929 (927), verified
test_user_2 = [0,0,251,10,0,132,0,330,508,0,238,0,873,182,730,0,0,0,151,0,177,512,0,0,0,0,384]

# Highest = Grocery, 2nd = Traveling
# Result = 627 (625), verified
test_user_3 = [0,0,446,0,167,0,0,353,370,0,0,0,871,339,0,0,0,0,96,0,185,441,0,0,0,0,720]

test_user = test_user_1

vsm_data = np.genfromtxt('vsm.csv', delimiter=",", skip_header=1, usecols=range(1, 28))
vsm_tree = spatial.KDTree(vsm_data)

print(vsm_tree.query(test_user))
