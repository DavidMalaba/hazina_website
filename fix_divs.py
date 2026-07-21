import sys

for file in sys.argv[1:]:
    with open(file, 'r') as f:
        lines = f.readlines()
    
    # We want to remove the exact line `                </div>` just before `            </fieldset>`
    # We will search from bottom up
    for i in range(len(lines)-1, 0, -1):
        if '</fieldset>' in lines[i]:
            # find the first </div> before it
            for j in range(i-1, -1, -1):
                if '</div>' in lines[j]:
                    print(f"Removing line {j+1} from {file}")
                    lines.pop(j)
                    break
            break
            
    with open(file, 'w') as f:
        f.writelines(lines)
